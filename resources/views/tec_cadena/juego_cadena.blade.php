@extends('connect.alumno')
@section('titulo_pagina', 'Técnica de la Cadena')
@section('descripcion_pagina', 'Formulario crear el juego de la cadena')
@section('archivos_style_form')
<style type="text/css">
  #icono-juego {
    width: 55px;
    height: 55px;
  }
  .clase-agregada{
    filter: brightness(50%);
  }
  /*#almacenarTecCadena{
    display: none;
    }*/
  </style>
  <link rel="stylesheet" href="{{ ('assets/css/theme.css') }}">
  @stop
  @section('content')
  <div id="about">
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
    <form method="post" action="{{route('almacenar_calificacion')}}" class="mt-5" enctype="multipart/form-data" >
      {{ csrf_field() }}
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
      <div id="imagenes_cadena" class="imagenes-cadena-mostrar">
        <div class="cadena">
          <div class="cadena-imagen-tiempo">
            <img v-bind:src="direccionImagen" />
          </div>       
        </div>
      </div>
      <div id="juego_cadena" class="ocultar-galeria">
        <div class="galeria">
          <div class="galeria-imagen" v-for="(dato, descripcion) in imagenes" v-on:click="imagenSeleccionada($event)">
            <img v-bind:src="dato"   id="descripcion" class="imagen" alt="img" />
          </div>
        </div>
      </div>
      <input type="text" name="tipo_tecnica" value="memoria">
      <input type="text" name="nombre_tecnica"  value="Tecnica de la cadena">
      <input type="text" name="puntaje" id="puntaje">
      <input type="text" name="hora" id="hora">
      <input type="text" name="fecha" id="fecha">
      <input type="text" name="rude" id="rude">
      <input type="text" name="comentario" id="comentario" value="ninguno">


      <button id="almacenarTecCadena">enviar</button>
    </form>
  </div>
  @stop
  @section('archivos_script_form')
  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <script>
    new Vue({
      el: "#about",
      data() {
        return {
          nombreJuego:"tecnicaDeCadena",
          imagenes: [
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F2.png?alt=media&token=b59e46ab-edcc-4bfa-b9c9-3dc4811f9565',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F7.png?alt=media&token=f3652966-06ea-43e1-81ba-333061f27de2',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F13.png?alt=media&token=567c3b40-f280-4d10-85d2-1c3e79318af8',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F3.png?alt=media&token=6fe4840f-5610-4f91-a1c5-8e7eb1ebc12d',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F1.png?alt=media&token=95b60c62-c6bc-4b48-847c-095d38eba0d8',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F4.png?alt=media&token=dda99fb4-7983-483e-99de-36379909ba6c',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F10.png?alt=media&token=4aad2f1f-8869-40d1-b287-45368bcf86ad',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F5.png?alt=media&token=5370db62-3bbe-4984-b8b8-7959082a47a4',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F6.png?alt=media&token=82df2554-497c-4a4a-a295-9b18887bc9c7',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F12.png?alt=media&token=cbac3737-ea68-4901-b3d4-09fe6b3670a5',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F11.png?alt=media&token=46d65ab4-7102-4ba3-9d97-efb81a88249e',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F8.png?alt=media&token=557e862b-29d4-4e46-9048-28b5a497d41d',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/cadena%2F9.png?alt=media&token=6f3a444a-e324-4525-80ee-265bbd306d47',
          ],
          seleccionImagen:[],
          direccionImagen:'',
          puntaje:0,
          timer: "",
        };
      },
      methods:{
        imagenSeleccionada:function(e){
          var imagen = e.target.src;
          e.target.classList.add("clase-agregada");
          this.seleccionImagen.push(imagen);  
          console.log(this.seleccionImagen);
        },
        juegoFinalizado(){
          for (let i = 0; i < 13; i++) {
            if(this.seleccionImagen[i]==this.imagenes[i]){
              this.puntaje=this.puntaje+1;
            }
          }
          var datetime=new Date();document.getElementById("puntaje").value=this.puntaje;document.getElementById("rude").value="7062007520132301";document.getElementById("hora").value= datetime.getDate() + '-' + (datetime.getMonth()+1) + '-' + datetime.getFullYear();document.getElementById("fecha").value=datetime;document.getElementById("almacenarTecCadena").click();
        },
        iniciar:function(e){
          console.log(this.imagenes.sort());
          document.getElementById("puntajeJuego").innerHTML=0;
          document.getElementById("juego_cadena").classList.remove("ver-galeria");
          document.getElementById("juego_cadena").classList.add("ocultar-galeria");
          document.getElementById("imagenes_cadena").classList.remove("imagenes-cadena-ocultar");
          document.getElementById("imagenes_cadena").classList.add("imagenes-cadena-mostrar");
          let _this = this;
          let num = 0;
          this.timer = setInterval(() => {
            if (num == 13) {
              clearInterval(_this.timer);
              document.getElementById("juego_cadena").classList.remove("ocultar-galeria");
              document.getElementById("juego_cadena").classList.add("ver-galeria");
              document.getElementById("imagenes_cadena").classList.remove("imagenes-cadena-mostrar");
              document.getElementById("imagenes_cadena").classList.add("imagenes-cadena-ocultar");
              console.log('finalizo el juego')
            }else{
              this.direccionImagen=this.imagenes[num];
              console.log(this.imagenes[num]);
            }
            num++
          }, 5000);
        },
      },
    });
  </script>
  @stop