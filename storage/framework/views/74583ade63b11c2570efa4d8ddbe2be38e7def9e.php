<?php $__env->startSection('titulo_pagina', 'Técnica de la Concentración'); ?>
<?php $__env->startSection('descripcion_pagina', 'Juego de video'); ?>
<?php $__env->startSection('content'); ?>
<div id="videojuego">
	<div name="concentration">
		<div class="row text-sm-center">
			<div class="col-6 col-sm mb-5 mb-sm-0" id="iniciar" v-on:click="iniciar()">
				<i class="svg-icon svg-icon-sm text-primary mb-3">
					<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/iniciar.png"/>
				</i>
				<h6 class="font-weight-medium text-gray-700" v-on:click="iniciar()">Iniciar juego</h6>
			</div>
			<div class="col-6 col-sm mb-5 mb-sm-0">
				<i class="svg-icon svg-icon-sm text-primary mb-3">
					<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/nivel.png"/>
				</i>
				<h6 class="font-weight-medium text-gray-700">Nivel medio</h6>
			</div>
			<div class="col-6 col-sm mb-5 mb-sm-0">
				<i class="svg-icon svg-icon-sm text-primary mb-3">
					<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/tiempo.png"/>
				</i>
				<h6 class="font-weight-medium text-gray-700">05:03:00</h6>
			</div>
			<div class="col-6 col-sm mb-5 mb-sm-0">
				<i class="svg-icon svg-icon-sm text-primary mb-3">
					<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/puntuacion.png">
				</i>
				<h6 class="font-weight-medium text-gray-700" id="puntajeJuego">0</h6>
			</div>
			<div class="col-6 col-sm" id="finalizarJuego" @click="juegoFinalizado()">
				<i class="svg-icon svg-icon-sm text-primary mb-3">
					<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/finalizar.png">
				</i>
				<h6 class="font-weight-medium text-gray-700">Finalizar</h6>
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
		<BR>
		<br>
		<!-- COMIENZA EL JUEGO DEL VIDEO -->
		<div id="contenedorVideo" class="video">
			<video class="video-etiqueta" controls> <source src='http://localhost/aprendizaje/storage/videos/tecnica_concentracion/$DatosJuego->archivo_id}}' type="video/mp4"><source src='http://localhost/aprendizaje/storage/videos/tecnica_concentracion/<?php echo e($DatosJuego->archivo_id, false); ?>' type="video/ogg">Your browser does not support the video tag.</video> 
			</div>
			<form method="post" action="<?php echo e(route('almacenar_calificacion'), false); ?>" class="mt-5" enctype="multipart/form-data">
				<?php echo e(csrf_field(), false); ?>

				<div id="cuestionarioGeneral" class="cuestionario div-ocultar">
					<div class="cuestionario-preguntas">
						<div class="test-contenedor-general">
							<div class="test-contenido">
								<h2>Responde las siguientes preguntas</h2>
								</br>
								<div class="pregunta-respuesta">
									<?php 
									$var = json_decode($DatosJuego->preguntas,TRUE);
									$contador=0;
									echo "<input type='text' class='div-ocultar' value='".count($var)."' id='numeroPreguntasJuego'>";
									echo "<input type='text' class='div-ocultar' value='".$DatosJuego->puntaje."' id='puntajePreguntasJuego'>";		
									foreach ($var as $pregunta) {
										$contador=$contador+1;
										echo "<div class='pregunta-pregunta'>
										<label class='col-md-12 test-pregunta'><span>".$contador.". </span>".$pregunta["pregunta"]."</label>		
										</div>";
										if($pregunta["tipo_pregunta"] == "cerrada"){
											$varRespuesta = $pregunta["repuesta"];
											$contadorRespuesta=0;
											foreach ($varRespuesta as $respuesta) {
												$contadorRespuesta = $contadorRespuesta+1;
												echo "<div class='pregunta-respuesta-opciones'>";
												echo "<input  type='radio' name='".$contador."' id='".$contador."' value='".$respuesta["correcto"]."' class='option-input radio'>"; 
												echo "<label>".$respuesta["respuesta"]."</label>";
												echo "</div>";
											}
										}
										echo "<br>";
									}
									?>
								</div>	
							</div>
						</div>
					</div>
				</div>
				<!---------- datos de los resultados del estudiante ------------>
				<input type="text" name="id_prueba_tecnica" value="<?php echo e($DatosJuego->id, false); ?>" class="div-ocultar">
				<input type="text" name="nombre_prueba_tecnica" value="<?php echo e($DatosJuego->titulo, false); ?>" class="div-ocultar">
				<input type="text" name="puntaje" id="puntaje" class="div-ocultar" value="0">
				<input type="text" name="tiempo" id="tiempo_juego" class="div-ocultar" value="0">
				<input type="text" name="rude" value="<?php echo e($numero_rude, false); ?>" class="div-ocultar">
				<input type="text" name="comentario" id="comentario" class="div-ocultar" value="<?php echo e($DatosJuego->tiempo, false); ?>">
				<input type="text" name="comentario" id="TiempoJuego" value="<?php echo e($DatosJuego->tiempo, false); ?>" class="div-ocultar">
				<input type="number" name="memoria_calificacion" value="0" class="div-ocultar">
				<input type="number" name="concentracion_calificacion" value="0" class="div-ocultar">
				<input type="number" name="calculo_calificacion" value="0" class="div-ocultar">

				<button id="calificarJuego" class="div-ocultar">Enviar</button>
			</form>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('archivos_script_form'); ?>
	<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
	<script>
		new Vue({
			el:"#videojuego",
			data(){
				return{
					puntaje:0,
					calificacion:0,
					resultado:0,
					numeroPreguntas:4,
					questions:'',
					puntajeJuego:<?php echo "$DatosJuego->puntaje"; ?>,
					jsonVideo:'',
				}
			},
			methods:{
				iniciar:function(e){
					console.log("Se inciara el  juego");
				},
				juegoFinalizado(){
					console.log("ingresa a finalizar pregunta");
					clearInterval(this.tiempo);
					this.numeroPreguntas = parseInt(document.getElementById("numeroPreguntasJuego").value);
					this.puntajePorPregunta = parseInt(document.getElementById("puntajePreguntasJuego").value);
					this.calificacion =  this.puntajePorPregunta / this.numeroPreguntas;
					for (this.numero = 1; this.numero < this.numeroPreguntas; this.numero++) {
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
					document.getElementById("calificarJuego").click()
				}
			},
			mounted() {
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
					if(juegoo===true){console.log(tiempoSegundos);
						segundoos++;document.getElementById("tiempo_juego").value=segundoos;
						if(tiempoSegundos === segundoos){
							document.getElementById('finalizarJuego').click();
						}else if(tiempoSegundosVideo == segundoos){
							console.log("Mostrar preguntas")
							document.getElementById("cuestionarioGeneral").classList.remove('div-ocultar');
							document.getElementById("cuestionarioGeneral").classList.add('div-mostrar');
							document.getElementById("contenedorVideo").classList.add('div-ocultar');
						}
					}
				}, 1000);
			},
		});
	</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('connect.alumno', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/tec_concentracion/juego_video.blade.php ENDPATH**/ ?>