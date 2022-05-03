<?php $__env->startSection('titulo_pagina', 'Pueba General'); ?>
<?php $__env->startSection('content'); ?>
<div id="test">
	<main id="content" role="main">
		<div id="openModal" v-bind:class="{mostrarModal: calificacionGeneral}" class="modalDialog">
			<div>
				<div class="container space-2-bottom space-3-bottom--lg mt-n9">
					<div class="card w-lg-90 shadow mx-lg-auto">
						<div class="card-body p-7">
							<!-- Title -->
							<p class="close" @click="CloseModal()">X</p>
							<div class="w-md-80 w-lg-60 text-center mx-md-auto mb-3">
								<h2 class="h3"><?php echo e($nombreAlumno, false); ?></h2>
								<p>La prueba general es evaluada sobre 100 puntos opteniendo una calificaion de:</p>
							</div>
							<div class="bg-purple row justify-content-lg-between text-center text-lg-left">
								<div class="hlas">
									<div class="cuadro-puntuacion">     
										<p class="prueba-calificacion-resultado-final" id="pruebaCalificacionEstudianate"></p>
									</div>
								</div>
								<div class="col-sm-12 col-lg-4 offset-sm-3 offset-lg-0 mb-4 mb-lg-0">
									<!-- Icon Block -->
									<div class="pr-lg-4 text-center">
										<img class="prueba-calificacion-imagen" src="../assets/svg/cabeza.svg" alt="Image Description">
										<p class="mb-1 text-center text-white letra-calificacion">Puntuación de memorización</p>
										<p class="h1 text-center text-white prueba-calificacion-numero" id="pruebaCalificacionConcentracion"></p>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
									<!-- Icon Block -->
									<div class="pr-lg-4 text-center">
										<img class="prueba-calificacion-imagen" src="../assets/svg/meditacion.svg" alt="Image Description">
										<p class="mb-1 text-white letra-calificacion">Puntuación de concentración </p>
										<p class="h1 text-center text-white prueba-calificacion-numero" id="pruebaCalificacionCalculo"></p>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 text-center">
									<img class="prueba-calificacion-imagen text-center" src="../assets/svg/matematicas.svg" alt="Image Description">
									<!-- Icon Block -->
									<div class="pr-lg-4">
										<p class="mb-1 text-white text-center letra-calificacion">Puntuación de cálculo</p>
										<p class="h1 text-center text-white prueba-calificacion-numero" id="pruebaCalificacionMemoria"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer bg-gray-100 text-center py-4 px-7">
							<a class="text-secondary text-center" href="#">
								Quieres mejorar las tecnicas de memorización, concentración y cálculo mental  
								<span class="fa fa-arrow-right font-size-13 ml-2">EMPECEMOS</span>
							</a>
						</div>
					</div>
				</div>
			</div>
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
		<div class="container space-2 space-3--lg">
			<div class="card-body">
				<form method="post" action="<?php echo e(route('almacenar_calificacion'), false); ?>" class="mt-5" enctype="multipart/form-data">
					<?php echo e(csrf_field(), false); ?>

					<div class="test-contenedor-general">
						<?php $__currentLoopData = $pruebasPreguntaEstudiante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prueba): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="test-contenido">
							<div class="prueba-pregunta">			
								<label class="col-md-12 test-pregunta"><span><?php echo e($prueba->orden, false); ?>. </span><?php echo e($prueba->pregunta, false); ?></label>
								<?php if($prueba->imagen != ''): ?>
								<img src='http://localhost/aprendizaje/storage/img/prueba_general/<?php echo e($prueba->imagen, false); ?>'>
								<?php endif; ?>		
							</div>	
							<div class="prueba-respuesta">
								<?php if($prueba->tipo_pregunta == "cerrada"): ?>
								<?php if($prueba->respuesta): ?>
								<?php $var = json_decode($prueba->respuesta,TRUE);
								foreach ($var as $value) {
									echo "<div class='prueba-respuesta-opciones'>";
									if ($value["correcto"] == "verdadero"){
										echo "<input  type='radio' name='".$prueba->orden."' id='".$prueba->orden."' value='".$prueba->seccion."' class='option-input radio'>";
									}else{	
										echo "<input  type='radio' name='".$prueba->orden."' id='".$prueba->orden."' value='".$value["correcto"]."' class='option-input radio'>";
									}
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
					<button type="button" class="btn btn-success" @click="evaluar()">Evaluar</button>
					<input type="hidden" name="id_prueba_tecnica" value="<?php echo $nombrePrueba; ?>">
					<input type="hidden" name="nombre_prueba_tecnica" value="<?php echo $nombrePrueba; ?>">
					<input type="hidden" id="tiempo_prueba" name="tiempo">			
					<input type="hidden" id="puntaje" name="puntaje">
					<input type="hidden" name="rude" value="<?php echo $estudianterude; ?>">
					<input type="hidden" id="puntaje_concentracion" name="concentracion_calificacion">
					<input type="hidden" id="puntaje_memoria" name="memoria_calificacion">
					<input type="hidden" id="puntaje_calculo" name="calculo_calificacion">
					<button class="div-ocultar" class="btn btn-primary" id="AlmacenarPrueba">enviar</button>
				</form>
			</div>
		</div>
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
				concentracion:0,
				memoria:0,
				calculo:0,
				calificacion:0
			}
		},
		methods:{
			evaluar(){	
				clearInterval(this.tiempo)
				this.numeroPreguntas = parseInt(<?php echo ($numero_preguntas_prueba);?>);
				this.puntajePorPregunta = parseInt(<?php echo ($pruebaCalificacion);?>);
				this.calificacion =  this.puntajePorPregunta / this.numeroPreguntas;
				for (this.numero = 1; this.numero < this.numeroPreguntas; this.numero++) {
					this.opcionesRespuesta = document.getElementsByName(this.numero)
					for (var i = 1; i < this.opcionesRespuesta.length; i++) {
						if (this.opcionesRespuesta[i].checked){
							console.log(this.opcionesRespuesta[i].checked);
							if(this.opcionesRespuesta[i].value == "concentracion"){
								this.resultado = this.resultado + this.calificacion;
								this.concentracion = this.concentracion + this.calificacion; 
							}
							if(this.opcionesRespuesta[i].value == "calculo"){
								this.resultado = this.resultado + this.calificacion;
								this.calculo = this.calculo + this.calificacion; 
							}
							if(this.opcionesRespuesta[i].value == "memoria"){
								this.resultado = this.resultado + this.calificacion;
								this.memoria = this.memoria + this.calificacion; 
							}
						}
					}
				}
				var resultadoFinal = this.resultado;
				resultadoFinal = resultadoFinal.toFixed(2);
				document.getElementById("puntaje").value=resultadoFinal;document.getElementById("pruebaCalificacionEstudianate").innerHTML=resultadoFinal;
				document.getElementById("puntaje_concentracion").value=this.concentracion.toFixed(2);document.getElementById("pruebaCalificacionConcentracion").innerHTML=this.concentracion.toFixed(2);
				document.getElementById("puntaje_memoria").value=this.memoria.toFixed(2);document.getElementById("pruebaCalificacionMemoria").innerHTML=this.memoria.toFixed(2);
				document.getElementById("puntaje_calculo").value=this.calculo.toFixed(2);document.getElementById("pruebaCalificacionCalculo").innerHTML=this.calculo.toFixed(2);
				this.calificacionGeneral = true;
			},
			CloseModal() {
				document.getElementById("AlmacenarPrueba").click()
				this.calificacionGeneral = false;
			}
		},
		mounted(){
			let finalizacionJuego = 80000
		    let time = '<?php echo($pruebaTiempo); ?>';
		    let tiempoSegundos=timeToSec(time);let segundoos=0;let tiempoDeJuego=0;let juegoo = true; 
			setTimeout(function () {
			    document.getElementById("evaluarTest").click();
			}, finalizacionJuego); 
			function timeToSec(time){
				var a = time.split(':');
		        // var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
		        var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60; 
		        return seconds;
		    }
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
<?php echo $__env->make('connect.alumno', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/prueba/pruebaGeneralEstudiante.blade.php ENDPATH**/ ?>