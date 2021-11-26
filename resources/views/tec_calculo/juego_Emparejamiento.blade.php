@extends('connect.alumno')
@section('titulo_pagina', 'Técnica de la Cadena')
@section('descripcion_pagina', 'Formulario crear el juego de la cadena')
@section('content')
@section('archivos_style_form')
<style type="text/css">
	#icono-juego {
		width: 55px;
		height: 55px;
	}
</style>
<link rel="stylesheet" href="{{ ('assets/css/theme.css') }}">
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
@stop
@section('content')
<div id="about">
	<br>
	<br>
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
	<div id="juegoEmparejar" class="contenedor-general-matriz">
		<div class="matriz contenedor-celda-matriz" v-for="(value, key, index) in matriz">
			<div class="matriz-celda juegoEmparejarMostrar" @click="celdaSeleccionada($event)">
				<p class="matriz-celda-contenido" @click="emparejar(value)">{{ key }}</p>
			</div>
		</div>     
	</div>
</div>
@stop
@section('archivos_script_form')
<script>
	new Vue({
		el: "#about",
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
        // console.log("Puntaje:", this.puntaje);
    },
    CloseModal() {
    	this.calificacionGeneral = false;
    },
    juegoFinalizado(){ 
    	var calificacionJuego ={
    		aprendizaje:"calculo",
    		nombe:"emparejamiento",
    		puntaje:this.puntaje

    	} 
    	var estudiante="7062007520132301";
    	dbfirebase.ref("calificacion/calculo").child(estudiante).push(calificacionJuego);
    }
}
});
</script>
@stop