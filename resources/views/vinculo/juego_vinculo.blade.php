@extends('connect.alumno')
@section('titulo_pagina', 'Técnica del vínculo')
@section('descripcion_pagina', 'Formulario crear el juego del vinculo')
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
            <h4>El sapo que quiso ser estrella</h4>
            <div class="card-body">
              He visto pasar una VÍBORA con el cuerpo lleno de luces. Parecía una cadena de ESTRELLAS y era porque se tragó a las LUCIÉRNAGAS del huerto. Así decía el SAPO, escondido bajo el ROSAL, que aquella noche estaba cubierto de BICHITOS de luz. -Pensar que si yo me tragara las LUCIÉRNAGAS de este ROSAL brillaría igual que la VÍBORA. Y me convertiría en ESTRELLA. Y todos los que me desprecian por mi FEALDAD se morirían de envidia al verme tan HERMOSO.
            </div>
          </div>       
        </div>
      </div>
      <div id="juego_cadena" class="ocultar-galeria">
        <div class="galeria">
          <div class="galeria-imagen" v-for="(dato, descripcion) in seleccionar_imagenes" v-on:click="imagenSeleccionada($event)">
            <img v-bind:src="dato"   id="descripcion" class="imagen" alt="img" />
          </div>
        </div>
      </div>
      <input type="hidden" name="tipo_tecnica" value="memoria">
      <input type="hidden" name="nombre_tecnica"  value="Tecnica de la cadena">
      <input type="hidden" name="puntaje" id="puntaje">
      <input type="hidden" name="hora" id="hora">
      <input type="hidden" name="fecha" id="fecha">
      <input type="hidden" name="rude" id="rude">
      <input type="hidden" name="comentario" id="comentario" value="ninguno">


      <button class="ocultar" id="almacenarTecCadena">enviar</button>
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
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F1.png?alt=media&token=13c1f622-340b-4090-bc0a-acb62bf699b9',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F2.png?alt=media&token=8db8bba4-53e4-49c0-946d-78ec609f8867',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F3.png?alt=media&token=0f540a55-4670-4b30-8557-ae88cdab949c',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F4.png?alt=media&token=ccc0f1db-6ea2-44dd-8dda-b82bce0bcbb8',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F5.png?alt=media&token=f8b55b4f-c042-44e1-8f47-58e3986ef8ff',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F6.png?alt=media&token=f8fd9f48-c370-4458-829d-6bbe9c2b9a78',
          ],
          seleccionar_imagenes: [
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F3.png?alt=media&token=0f540a55-4670-4b30-8557-ae88cdab949c',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F1.png?alt=media&token=13c1f622-340b-4090-bc0a-acb62bf699b9',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F4.png?alt=media&token=ccc0f1db-6ea2-44dd-8dda-b82bce0bcbb8',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F2.png?alt=media&token=8db8bba4-53e4-49c0-946d-78ec609f8867',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F6.png?alt=media&token=f8fd9f48-c370-4458-829d-6bbe9c2b9a78',
          'https://firebasestorage.googleapis.com/v0/b/aprendizaje-57cdc.appspot.com/o/vinculo%2F5.png?alt=media&token=f8b55b4f-c042-44e1-8f47-58e3986ef8ff',
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
          for (let i = 0; i < 6; i++) {
            if(this.seleccionImagen[i]==this.imagenes[i]){
              this.puntaje=this.puntaje+16.67;
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
            if (num == 6) {
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