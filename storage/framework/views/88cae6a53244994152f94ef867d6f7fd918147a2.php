<?php $__env->startSection('titulo_pagina', 'Técnica de la Cadena'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario crear el juego de la cadena'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('archivos_style_form'); ?>
<style type="text/css">
	#icono-juego {
		width: 55px;
		height: 55px;
	}
</style>
<link rel="stylesheet" href="<?php echo e(('assets/css/theme.css'), false); ?>">
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="calculoJuego">
	<br>
	<div class="row text-sm-center">
		<div class="col-6 col-sm mb-5 mb-sm-0" v-on:click="iniciar()">
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
		<div class="col-6 col-sm">
			<i class="svg-icon svg-icon-sm text-primary mb-3">
				<img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/finalizar.png">
			</i>
			<h6 class="font-weight-medium text-gray-700" @click="juegoFinalizado()">Finalizar</h6>
		</div>
	</div>
	<!---------- datos de los resultados del estudiante ------------>
	<input type="text" name="id_prueba_tecnica" value="<?php echo e($DatosJuego->id, false); ?>">
	<input type="text" name="nombre_prueba_tecnica" value="<?php echo e($DatosJuego->titulo, false); ?>">
	<input type="text" name="puntaje" id="puntaje">
	<input type="text" name="tiempo" id="tiempo_juego">
	<input type="text" name="rude" value="<?php echo e($numero_rude, false); ?>">
	<input type="text" name="comentario" id="comentario" value="<?php echo e($DatosJuego->tiempo, false); ?>">
	<input type="text" name="comentario" id="TiempoJuego" value="<?php echo e($DatosJuego->tiempo, false); ?>">
	<input type="number" name="memoria_calificacion" value="0">
	<input type="number" name="concentracion_calificacion" value="0">
	<input type="number" name="calculo_calificacion" value="0">
	
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('archivos_script_form'); ?>
<?php $__env->startSection('archivos_script_form'); ?>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script>
	new Vue({
		el: "#calculoJuego",
		data() {
			return {
				matriz:{
					"10+5":"1",
					"15":"1",
					"4+3":"2",
					"7":"2",
					"11+5":"3",
					"16":"3",
					"3+3":"4",
					"6":"4",
					"5X2":"5",
					"10":"5",
					"9x2":"6",
					"18":"6",
				},
				numeroRude:806200262016001,
				emparejar1:"",
				matrizFila:3,
				matrizColumna:3,
				emparejar2:"",
				puntaje:0,
				tiempoJuegoEnSegundos:30,
				cronometroSegundos:0,
			}
		},
		methods:{
			iniciar(){
				var timepoDeJuego=this.tiempoJuegoEnSegundos;
				var segundos=0;
				this.cronometroSegundos=0;
				var tiempoEmparajar = this.tiempoJuegoEnSegundos/2; 
				var timer = setInterval(function(){
					if(segundos === timepoDeJuego){
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
			emparejar(valor){
				if(this.emparejar1 != ""){
					this.emparejar2=valor
				}
				if (this.emparejar1 == ""){
					this.emparejar1=valor;
				}
				console.log("Emparejar1:", this.emparejar1);
				console.log("Emparejar2:", this.emparejar2);
				if (this.emparejar1!="" & this.emparejar2!="") {
					if (this.emparejar1 == this.emparejar2) {
						this.puntaje=this.puntaje+16
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
				var calificacionJuego ={
					aprendizaje:"calculo",
					nombe:"emparejamiento",
					puntaje:this.puntaje

				} 
				var estudiante="7062007520132301";
				dbfirebase.ref("calificacion/calculo").child(estudiante).push(calificacionJuego);
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
						console.log("mostrar preguntas")
					}
				}
			}, 1000);
		},
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('connect.alumno', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/tec_calculo/juego_emparejamiento.blade.php ENDPATH**/ ?>