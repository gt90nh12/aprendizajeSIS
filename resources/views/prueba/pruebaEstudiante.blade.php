@extends('connect.alumno')
@section('content')
@if($nombrePrueba === "calculo")
<h3 class="text-themecolor mb-0 mt-0">Prueba<span> cálculo</span></h3>
@endif
@if($nombrePrueba === "memoria")
<h3 class="text-themecolor mb-0 mt-0 ">Prueba<span> memoria</span></h3>
@endif
@if($nombrePrueba === "concentracion")
<h3 class="text-themecolor mb-0 mt-0">Prueba<span> concentración</span></h3>
@endif
<br>
<div id="test">
	<main id="content" role="main">
		<div class="prueba-portada" id="protadaPruebaEstudiante">
			<img class="prueba-vector" src="http://localhost/aprendizaje/storage/vector/{{$nombrePrueba}}.svg" alt="triangle with equal sides" srcset="http://localhost/aprendizaje/storage/vector/{{$nombrePrueba}}.svg">
			<button id="generartest" @click="generartest()" type="button" class="btn waves-effect waves-light btn-rounded btn-outline-success">Iniciar prueba</button>
		</div> 
		@if(Session::has('message'))
		<div class="container">
			<div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
				{{ Session::get('message')}}
				@if ($errors->any())
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
				@endif
				<script>
					$('.alert').slideDown();
					setTimeout(function(){$('.alert').slideUp(); }, 10000);
				</script>
			</div>
		</div>
		@endif
		<!--    COMENZANDO CON LA PRUEBA GENERAL  -->
		<div class="container space-2 space-3--lg div-ocultar" id="contenedorPruebaEstudiante">
			<form method="post" action="{{route('almacenar_calificacion')}}" class="mt-5" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="test-contenedor-general">
					@foreach($pruebasPreguntaEstudiante as $prueba)
					<div class="test-contenido">
						<div class="prueba-pregunta">
							<label class="col-md-12 test-pregunta"><span>{{$prueba->orden}}. </span>{{$prueba->pregunta}}</label>
							@if($prueba->imagen != '' and $prueba->imagen != "no hay imagen" )
							<img src='http://localhost/aprendizaje/storage/img/prueba_general/{{$prueba->imagen}}'>
							@endif		
						</div>	
						<div class="prueba-respuesta">
							@if($prueba->tipo_pregunta == "cerrada")
							@if($prueba->respuesta)
							<?php $var = json_decode($prueba->respuesta,TRUE);
							foreach ($var as $value) {
								echo "<div class='prueba-respuesta-opciones'>";
								echo "<input  type='radio' name='".$prueba->id."' id='".$prueba->id."' value='".$value["correcto"]."' class='option-input radio'>"; 
								if($value["respuesta"] != ""){
									echo "<label for='".$prueba->orden."'>".$value["respuesta"]."</label>";
								}
								if($value["imagen"] != "no hay imagen"){
									echo "<img src='http://localhost/aprendizaje/storage/img/prueba_general/".$value["imagen"]."'>";
								}
								echo "</div>";
								echo "<br>";
							}
							?>
							@endif
							@endif
						</div>	
					</div>
					@endforeach
				</div>
				<input type="button"  class="btn btn-success" @click="evaluar()" value="Evaluar">
				<input type="text" name="id_prueba_tecnica" value="<?php echo $nombrePrueba; ?>">
				<input type="text" name="nombre_prueba_tecnica" value="<?php echo $nombrePrueba; ?>">
				<input type="text" id="tiempo_prueba" name="tiempo">			
				<input type="text" id="puntaje" name="puntaje">
				<input type="text" id="puntaje_concentracion" name="concentracion_calificacion" value="0">
				<input type="text" id="puntaje_memoria" name="memoria_calificacion" value="0">
				<input type="text" id="puntaje_calculo" name="calculo_calificacion" value="0">
				<input type="text" name="rude" value="<?php echo $estudianterude; ?>">
				<button id="AlmacenarPrueba" class="div-ocultar">Enviar</button>
			</form>
		</div>
		<!--      FINALIZANDO LA PRUEBA GENERAL   -->
	</main>
</div>
@stop
@section('archivos_script_form')
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script type="text/javascript">
	new Vue({
		el: "#test",
		data() {
			return {
				calificacionGeneral: false,
				datatest : {},
				numero:0,
				resultado:0,
				numeroPreguntas:0,
				puntajePorPregunta:0,
				opcionesRespuesta:'',
				calificacion:0
			}
		},
		methods:{
			generartest(){
				document.getElementById("protadaPruebaEstudiante").classList.remove("prueba-portada");
				document.getElementById("protadaPruebaEstudiante").classList.add("div-ocultar");
				document.getElementById("contenedorPruebaEstudiante").classList.remove("div-ocultar");
				document.getElementById("contenedorPruebaEstudiante").classList.add("div-mostrar");
			},
			evaluar(){	
				clearInterval(this.tiempo)
				this.numeroPreguntas = parseInt(<?php echo ($numero_preguntas_prueba);?>);
				this.puntajePorPregunta = parseInt(<?php echo ($pruebaCalificacion);?>);
				this.calificacion =  this.puntajePorPregunta / this.numeroPreguntas;
				for (this.numero = 1; this.numero < this.numeroPreguntas; this.numero++) {
                    // console.log(this.numero)
                    this.opcionesRespuesta = document.getElementsByName(this.numero)
                    for (var i = 1; i < this.opcionesRespuesta.length; i++) {
                    	if (this.opcionesRespuesta[i].checked){
                    		if(this.opcionesRespuesta[i].value == "verdadero"){
                    			this.resultado = this.resultado + this.calificacion;
                    		}
                    	}
                    }
                }
                document.getElementById("puntaje").value=this.resultado;
                document.getElementById("AlmacenarPrueba").click();
                this.calificacionGeneral = true;
            },
            CloseModal() {
            	this.calificacionGeneral = false;
            }
        },
        mounted(){
        	function timeToSec(time){
        		var a = time.split(':');
		        // var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
		        var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60; 
		        return seconds;
		    }
		    let time = '<?php echo($pruebaTiempo); ?>';
		    let tiempoSegundos=timeToSec(time);let segundoos=0;let tiempoDeJuego=0;let juegoo = false; 
		    document.getElementById('generartest').addEventListener('click', function() {
		    	console.log("iniciamos prueba"); juegoo=true;
		    });
		    this.tiempo = setInterval(function(){ 
		    	if(juegoo===true){
		    		if(tiempoSegundos<=1){console.log("Tiempo cumplido de la prueba");}
		    		tiempoSegundos--;segundoos++;document.getElementById("tiempo_prueba").value=segundoos;
		    	}else{
		    		tiempoDeJuego++;
		    	}
		    }, 1000);
		}
	});
</script>
@stop