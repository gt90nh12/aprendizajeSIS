@extends('connect.alumno')
@section('titulo_pagina', 'Técnica de la Cadena')
@section('descripcion_pagina', 'Juego emparejar')
@section('content')
@section('archivos_style_form')
<style type="text/css">
	#icono-juego {
		width: 55px;
		height: 55px;
	}
</style>
<link rel="stylesheet" href="{{ ('assets/css/theme.css') }}">
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>

@stop
@section('content')
<div id="calculoJuego">
	<div class="row text-sm-center">
		<div class="col-6 col-sm mb-5 mb-sm-0" id="iniciar" v-on:click="iniciar()">
			<i class="svg-icon svg-icon-sm text-primary mb-3">
				<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/iniciar.png"/>
			</i>
			<h6 class="font-weight-medium text-gray-700">Iniciar juego</h6>
		</div>
		<div class="col-6 col-sm mb-5 mb-sm-0">
			<i class="svg-icon svg-icon-sm text-primary mb-3">
				<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/nivel.png"/>
			</i>
			<h6 class="font-weight-medium text-gray-700">Nivel<span> {{$DatosJuego->nivel}}</span></h6>
		</div>
		<div class="col-6 col-sm mb-5 mb-sm-0">
			<i class="svg-icon svg-icon-sm text-primary mb-3">
				<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/tiempo.png"/>
			</i>
			<h6 class="font-weight-medium text-gray-700">{{$DatosJuego->tiempo}}</h6>
		</div>
		<div class="col-6 col-sm mb-5 mb-sm-0">
			<i class="svg-icon svg-icon-sm text-primary mb-3">
				<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/puntuacion.png">
			</i>
			<h6 class="font-weight-medium text-gray-700" id="puntajeJuego">{{$DatosJuego->puntaje}}</h6>
		</div>
		<div class="col-6 col-sm" id="finalizarJuego" @click="juegoFinalizado()">
			<i class="svg-icon svg-icon-sm text-primary mb-3">
				<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/finalizar.png">
			</i>
			<h6 class="font-weight-medium text-gray-700" @click="juegoFinalizado()">Finalizar</h6>
		</div>
	</div>
	<form method="post" action="{{route('almacenar_calificacion')}}" class="mt-5"  >
		{{ csrf_field() }}
		<div id="juegoEmparejar" class="contenedor-general-matriz">
			<?php	
			$matrizEmparejar = json_decode($celdasMatriz, TRUE); 
			shuffle($matrizEmparejar);
			foreach($matrizEmparejar as $value){
				$mostrarCelda='';$emparejarCelda=0;$tipocelda="";
				foreach ($value as $key=>$element) {
					if($key == 'CELADAPREGUNTA'){
						$mostrarCelda = $element;
					}elseif($key == 'CELDANUMEROPREGUNTA'){
						$emparejarCelda = $element;
						$tipocelda = 1;
					}elseif($key == 'CELDARESPUESTA'){
						$mostrarCelda = $element;
					}elseif($key == 'CELDANUMERORESPUESTA'){
						$emparejarCelda = $element;
						$tipocelda = 2;
					}else{
						echo "no hay dato";echo "<br>";
					}
				}
			// echo "Celda: ".$mostrarCelda." - "."Emparejar".$emparejarCelda."<br>";
				echo '<div class="matriz contenedor-celda-matriz"><div class="matriz-celda juegoEmparejarMostrar" @click="celdaSeleccionada($event)"><p class="matriz-celda-contenido" @click="emparejar('.$emparejarCelda.','.$tipocelda.')">'.$mostrarCelda.'</p></div></div>';
			}	
			?>
		</div>
		<!---------- datos de los resultados del estudiante ------------>
		<input type="text" name="id_prueba_tecnica" class="ocultar" value="juegoCalculo">
		<input type="text" name="nombre_prueba_tecnica" class="ocultar" value="{{$DatosJuego->titulo}}">
		<input type="text" name="puntaje" id="puntaje" class="ocultar" value="0">
		<input type="text" name="tiempo" id="tiempo_juego" class="ocultar" value="0">
		<input type="text" name="rude" class="ocultar" value="{{$numero_rude}}">
		<input type="text" name="comentario" id="comentario" class="ocultar" value="{{$DatosJuego->tiempo}}">
		<input type="text" name="comentario" id="TiempoJuego" class="ocultar" value="{{$DatosJuego->tiempo}}">
		<input type="number" name="memoria_calificacion" class="ocultar" value="0">
		<input type="number" name="concentracion_calificacion" class="ocultar" value="0">
		<input type="number" name="calculo_calificacion" class="ocultar" value="0">
		<button id="almacenarTecnicaJuego"class="ocultar" >enviar</button>
	</form>
</div>
@stop
@section('archivos_script_form')
<script>
	new Vue({
		el: "#calculoJuego",
		data() {
			return {
				matriz:<?php print_r($celdasMatriz) ?>,
				numeroRude:806200262016001,
				emparejar1:"",
				emparejar2:"",
				puntaje:0,
				puntajeEmparejamiento:<?php echo $puntajeEmparejamiento; ?>,
				cronometroSegundos:0,
			}
		},
		methods:{
			iniciar(){
				var tiempoJuegoDb = document.getElementById("TiempoJuego").value;
				var s = tiempoJuegoDb.split(':');
				var tiempoDeJuegoEnSegundos = (+s[0]) * 60 * 60 + (+s[1]) * 60 + (+s[2]); 
				var segundos=0;
				this.cronometroSegundos=0;
				var tiempoEmparajar = tiempoDeJuegoEnSegundos/2; 
				var timer = setInterval(function(){
					if(segundos === tiempoDeJuegoEnSegundos){
						clearInterval(timer);
						alert("Juego Finalizado");
					}
					if(segundos == tiempoEmparajar){
						document.getElementById("juegoEmparejar").classList.add("juegoEmparejarOcultar");
					}
					segundos++;
					console.log(segundos);
					this.cronometroSegundos=this.cronometroSegundos+1;
				},1000);

			},
			celdaSeleccionada:function(e){
				var celda = e.target.src;
				e.target.classList.add("celdaMostrar");
			},
			emparejar(valor, dato){
				console.log('---------------------'+dato+'---------------------')
				if(dato == 1){
					if(typeof this.emparejar1 === 'number'){
						this.emparejar2=valor
					}else{
						this.emparejar1=valor
					}
				}else if(dato == 2 ){
					if(typeof this.emparejar2 === 'number'){
						this.emparejar1=valor
					}else{
						this.emparejar2=valor
					}
				}else{
					console.log("No hay datos para emparejar");
				}
				console.log("celda1:", typeof(this.emparejar1));
				console.log("celda2:", typeof(this.emparejar2));
				if (typeof this.emparejar1 === 'number' && typeof this.emparejar2 === 'number') {
					console.log("Ingresa a emprarejar")
					if (this.emparejar1 == this.emparejar2) {
						this.puntaje=this.puntaje +  this.puntajeEmparejamiento; console.log(this.puntajeEmparejamiento);
					} 
					this.emparejar1=""
					this.emparejar2=""
				}
				console.log("Puntaje:", this.puntaje);
			},
			CloseModal() {
				this.calificacionGeneral = false;
			},
			juegoFinalizado(){ 
				clearInterval(this.tiempo);
				document.getElementById("puntaje").value=this.puntaje
				document.getElementById("almacenarTecnicaJuego").click()
			},
		},
		mounted() {

			var myArray = <?php print_r($celdasMatriz) ?>;
			var i,j,k;
			for (i = myArray.length; i; i--) {
				j = Math.floor(Math.random() * i);
				k = myArray[i - 1];
				myArray[i - 1] = myArray[j];
				myArray[j] = k;
			}
			// console.log(myArray);

			this.matriz = myArray;

			let tiempoSegundos=0
			let tiempoSegundosVideo=0
			let segundoos=0
			let juegoo = false
			document.getElementById('iniciar').addEventListener('click', function() {
				var time = document.getElementById("TiempoJuego").value;
				var a = time.split(':') 
				tiempoSegundos = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
				tiempoSegundosVideo = tiempoSegundos/2
				juegoo=true;
			});
			this.tiempo = setInterval(function(){ 
				if(juegoo===true){
					segundoos++;document.getElementById("tiempo_juego").value=segundoos;
					if(tiempoSegundos === segundoos){
						document.getElementById('finalizarJuego').click();
					}else if(tiempoSegundosVideo == segundoos){
						console.log("mostrar preguntas")
					}
				}
			}, 1000);
		},
	});
</script>
@stop