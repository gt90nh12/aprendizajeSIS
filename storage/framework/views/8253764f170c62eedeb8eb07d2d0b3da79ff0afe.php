<?php $__env->startSection('content'); ?>
<?php if($nombrePrueba === "calculo"): ?>
<h3 class="text-themecolor mb-0 mt-0">Prueba<span> cálculo</span></h3>
<?php endif; ?>
<?php if($nombrePrueba === "memoria"): ?>
<h3 class="text-themecolor mb-0 mt-0 ">Prueba<span> memoria</span></h3>
<?php endif; ?>
<?php if($nombrePrueba === "concentracion"): ?>
<h3 class="text-themecolor mb-0 mt-0">Prueba<span> concentración</span></h3>
<?php endif; ?>
<br>
<div id="test">
	<main id="content" role="main">
		<div class="prueba-portada" id="protadaPruebaEstudiante">
			<img class="prueba-vector" src="http://localhost/aprendizaje/storage/vector/<?php echo e($nombrePrueba, false); ?>.svg" alt="triangle with equal sides" srcset="http://localhost/aprendizaje/storage/vector/<?php echo e($nombrePrueba, false); ?>.svg">
			<button id="generartest" @click="generartest()" type="button" class="btn waves-effect waves-light btn-rounded btn-outline-success">Iniciar prueba</button>
		</div> 
		<?php if(Session::has('message')): ?>
		<div class="container">
			<div class="alert alert-<?php echo e(Session::get('typealert'), false); ?>" style="display:none;">
				<?php echo e(Session::get('message'), false); ?>

				<?php if($errors->any()): ?>
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error, false); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
				<?php endif; ?>
				<script>
					$('.alert').slideDown();
					setTimeout(function(){$('.alert').slideUp(); }, 10000);
				</script>
			</div>
		</div>
		<?php endif; ?>
		<!--    COMENZANDO CON LA PRUEBA GENERAL  -->
		<div class="container space-2 space-3--lg div-ocultar" id="contenedorPruebaEstudiante">
			<form method="post" action="<?php echo e(route('almacenar_calificacion'), false); ?>" class="mt-5" enctype="multipart/form-data">
				<?php echo e(csrf_field(), false); ?>

				<div class="test-contenedor-general">
					<?php $__currentLoopData = $pruebasPreguntaEstudiante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prueba): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="test-contenido">
						<div class="prueba-pregunta">
							<label class="col-md-12 test-pregunta"><span><?php echo e($prueba->orden, false); ?>. </span><?php echo e($prueba->pregunta, false); ?></label>
							<?php if($prueba->imagen != '' and $prueba->imagen != "no hay imagen" ): ?>
							<img src='http://localhost/aprendizaje/storage/img/prueba_general/<?php echo e($prueba->imagen, false); ?>'>
							<?php endif; ?>		
						</div>	
						<div class="prueba-respuesta">
							<?php if($prueba->tipo_pregunta == "cerrada"): ?>
							<?php if($prueba->respuesta): ?>
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
							<?php endif; ?>
							<?php endif; ?>
						</div>	
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('archivos_script_form'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('connect.alumno', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/prueba/pruebaEstudiante.blade.php ENDPATH**/ ?>