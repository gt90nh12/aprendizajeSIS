@extends('connect.alumno')
@section('titulo_pagina', 'Técnica de la Concentración')
@section('descripcion_pagina', 'juego de Video')
@section('content')
<div name="concentration">
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
	<div class="video">
		<video class="video-etiqueta" controls> <source src="https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/concentracion%2FBOLIVIA%20TE%20ESPERA_001.mp4?alt=media&token=0da5de2a-5353-4d02-b8f4-c3c217565bd4" type="video/mp4"><source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.</video> 
		</div>
		<div class="cuestionario">
			<div class="cuestionario-preguntas">
				<form class="form-horizontal form-material">
					<div v-for="(value, key) in questions" class="test-contenedor-general">
						<div class="test-contenido" v-for="(dato, descripcion) in value">
							<div class="pregunta-cerrada" v-if="(value.tipo == 'cerrada')">

								<label v-if="(descripcion == 'pregunta' )" class="col-md-12 test-pregunta"><span>. </span></label>
								<div class="respuesta-contenedor" v-if="(descripcion == 'respuesta' )">
									<div v-for="(respuesta, calificacion) in dato">
										<label v-bind:for="key" ></label>
										<input  type="radio"  v-bind:name="key" v-bind:id="key" v-bind:value="respuesta">
									</div>
								</div>
							</div> 
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
@stop
@section('archivos_script_form')
	<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
	<script>
		import firebase from 'firebase'
		import db from '@/firebase/init'
		let jsonVideo = {};
		let dbfirebase = db.database();
		let concentrationdb = dbfirebase.ref('concentracion');
		concentrationdb.on("value", function(snapshot) {
			jsonVideo = snapshot.val(); console.log(jsonVideo);
		}, function (errorObject) {
			console.log("The read failed: " + errorObject.code);
		}); 
		export default{
			name:'concentration',
			data(){
				return{
					reglasJuego:{
						"video":"https://www.youtube.com/watch?v=E-Bv9bLDhF8",
						"tiempoVideo":"5:32",
						"calificacion":"50",
						"tiempoJuego":"5"
					},
					puntaje:0,
					calificacion:0,
					resultado:0,
					numeroPreguntas:4,
					questions:'',
				}
			},
			methods:{
				videoQuestions(){
					this.questions = jsonVideo;
				},
				iniciar(){
					this.questions = jsonVideo;
					var tiempoDeJuego = this.reglasJuego.tiempoJuego;console.log(tiempoDeJuego);
					var segundos = 0;
					var timer = setInterval(function(){
						if(segundos == tiempoDeJuego){
							clearInterval(timer);
						}
						segundos++;console.log(segundos);
					},1000);
				},

				juegoFinalizado(){
					this.calificacion = 100 / this.numeroPreguntas;
					for (this.numero = 1; this.numero < this.numeroPreguntas; this.numero++) {
						this.opcionesRespuesta = document.getElementsByName(this.numero)
                                  for (var i = 1; i < this.opcionesRespuesta.length; i++) {
                                  	if (this.opcionesRespuesta[i].checked){
                                    if(this.opcionesRespuesta[i].value){
                                    	this.resultado = this.resultado + this.calificacion;
                                    	this.puntaje=this.resultado;
                                    }
                                }
                            }
                        }
                        var calificacionJuego ={
                        	aprendizaje:"concentracion",
                        	nombe:"video",
                        	puntaje:this.resultado
                        } 
                        var estudiante="7062007520132301";
                        dbfirebase.ref("calificacion/concentracion").child(estudiante).push(calificacionJuego);  
                        console.log(this.resultado); 
                    }
                }
            }
        </script>
        @stop