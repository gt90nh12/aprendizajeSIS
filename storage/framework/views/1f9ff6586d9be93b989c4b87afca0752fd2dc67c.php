<?php $__env->startSection('titulo_pagina', 'Técnica de la Cadena'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario crear el juego de la cadena'); ?>
<?php $__env->startSection('archivos_style_form'); ?>
<style type="text/css">
  /*Estilos de la tecnica de la cadena*/
  .cadena{
    align-items: center;
    display: flex;
    justify-content: center;
    width: 100%;
  }
  .cadena-imagen-tiempo{
    text-align: center;
    border: 10px solid #f5f8fb;
    padding: 50px;
    width: 70%;
  }
  .cadena-imagen-tiempo img{
    object-fit: cover;
    width: 100%;
  }
  .galeria{
    align-items: center;
    /*background: blue;*/
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-left: 5%;
    padding-right: 5%;
    padding-top: 5%;
    height: auto; 
    width: 100%;
  }
  .galeria-imagen{
    border: 1px solid #fFF; 
    text-align: center;
    height: 220px;
    width: 290px;
  }
  .galeria-imagen img{
    height: 80%;
    width: 80%;
  }
  #icono-juego {
    width: 55px;
    height: 55px;
  }
  .clase-agregada{
    filter: brightness(10%);
    /*filter: drop-shadow(-2px 2px 15px rgba(0, 0, 0, 0.7));*/
    /*filter: drop-shadow(5px 5px 10px #444);*/
  }
</style>
<link rel="stylesheet" href="<?php echo e(('assets/css/theme.css'), false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="about">
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
  <form method="post" action="<?php echo e(route('almacenar_calificacion'), false); ?>" class="mt-5" enctype="multipart/form-data" >
    <?php echo e(csrf_field(), false); ?>

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
      <div class="col-6 col-sm">
        <i class="svg-icon svg-icon-sm text-primary mb-3">
          <img class="img-lista img-responsive" id="icono-juego" src="http://localhost/aprendizaje/public/assets/imagenesSIS/finalizar.png">
        </i>
        <h6 class="font-weight-medium text-gray-700"id="finalizarJuego" @click="juegoFinalizado()">Finalizar</h6>
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
        <div class="galeria-imagen" v-for="(dato, descripcion) in imagenesRandom" v-on:click="imagenSeleccionada($event)">
          <img v-bind:src="dato"   id="descripcion" class="imagen" alt="img" />
        </div>
      </div>
    </div>
    <input type="text" class="div-ocultar" name="id_prueba_tecnica" value="<?php echo e($juegoCadena->id, false); ?>">
    <input type="text" class="div-ocultar" name="nombre_prueba_tecnica" value="<?php echo e($juegoCadena->titulo, false); ?>">
    <input type="text" class="div-ocultar" name="rude"  value="<?php echo e($numero_rude, false); ?>">
    <input type="text" class="div-ocultar" name="puntaje" id="puntaje" value=0>
    <input type="text" class="div-ocultar" name="hora" id="hora">
    <input type="text" class="div-ocultar" name="fecha" id="fecha">
    <input type="text" class="div-ocultar" name="tiempo" id="tiempo_juego" value="0">
    <input type="text" class="div-ocultar" name="comentario" id="comentario" value="<?php echo e($juegoCadena->tiempo, false); ?>">
    <input type="number" class="div-ocultar" name="memoria_calificacion" value="0">
    <input type="number" class="div-ocultar" name="concentracion_calificacion" value="0">
    <input type="number" class="div-ocultar" name="calculo_calificacion" value="0">


    <button class="div-ocultar" id="almacenarTecCadena">enviar</button>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('archivos_script_form'); ?>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script>
  new Vue({
    el: "#about",
    data() {
      var imagenesPhp = <?php print_r($imgCadena); ?>; 
      // console.log(imagenesPhp);
      var i,j,k;
      for (i = imagenesPhp.length; i; i--) {j = Math.floor(Math.random() * i);k = imagenesPhp[i - 1];imagenesPhp[i - 1] = imagenesPhp[j];imagenesPhp[j] = k;}
      var imagenesRandom = imagenesPhp;
      // console.log(imagenesRandom)
      var imagenes = <?php print_r($imgCadena); ?>;
      return {
        nombreJuego:"tecnicaDeCadena",
        imagenes,
        imagenesRandom,
        numeroImagenes:imagenes.length,  
        sumatoriaPuntajes:0,
        seleccionImagen:[],
        direccionImagen:'',
        puntajeJuego:<?php echo "$juegoCadena->puntaje";?>,
        puntajeEstudiante:0,
        timepo:0,
        segundos:0,
        terminar:false,
        timer: "",
      };
    },
    methods:{
      imagenSeleccionada:function(e){
        var imagen = e.target.src;
        e.target.classList.add("clase-agregada");
        this.seleccionImagen.push(imagen);  
      },
      iniciar:function(e){
        console.log("Puntaje: " + this.puntajeJuego + " Numero imagenes: " + this.numeroImagenes + " Puntaje por juego: "+this.puntajeJuego/this.numeroImagenes)
        document.getElementById("puntajeJuego").innerHTML=0;document.getElementById("juego_cadena").classList.remove("ver-galeria");document.getElementById("juego_cadena").classList.add("ocultar-galeria");document.getElementById("imagenes_cadena").classList.remove("imagenes-cadena-ocultar");document.getElementById("imagenes_cadena").classList.add("imagenes-cadena-mostrar");
        let _this = this;
        let num = 0;
        this.timer = setInterval(() => {
          if (num == this.numeroImagenes) {
            clearInterval(this.timer);
            document.getElementById("juego_cadena").classList.remove("ocultar-galeria");document.getElementById("juego_cadena").classList.add("ver-galeria");document.getElementById("imagenes_cadena").classList.remove("imagenes-cadena-mostrar");document.getElementById("imagenes_cadena").classList.add("imagenes-cadena-ocultar");
            console.log('Seleccionar las imagenes en el orden que se les presento.')
          }else{
            this.direccionImagen=this.imagenes[num];
          }
          num++
        }, 1000);
      },
      juegoFinalizado(){
        clearInterval(this.tiempo)
        var puntajePorImagen = this.puntajeJuego/this.numeroImagenes;
        for (let i = 0; i < this.numeroImagenes+1; i++) {
          if(this.seleccionImagen[i]==this.imagenes[i]){
            this.puntajeEstudiante=this.puntajeEstudiante + puntajePorImagen;
          }
        }
        var datetime=new Date();
        document.getElementById("puntaje").value=this.puntajeEstudiante;
        document.getElementById("fecha").value= datetime.getDate() + '-' + (datetime.getMonth()+1) + '-' + datetime.getFullYear();
        document.getElementById("hora").value=datetime.getHours()+ ':' +datetime.getMinutes()+ ':' +datetime.getSeconds();
        console.log(Date.now());
        document.getElementById("almacenarTecCadena").click();
      }
    },
    mounted() {
      function timeToSec(time){
        var a = time.split(':');
          //var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
          var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60; 
          return seconds;
        }
        var time = '<?php echo($juegoCadena->tiempo); ?>';
        let tiempoSegundos=timeToSec(time);let segundoos=0;let tiempoDeJuego=0;let juegoo = false;
        document.getElementById('iniciar').addEventListener('click', function() {
          juegoo=true;
        });
        this.tiempo = setInterval(function(){ 
          if(juegoo===true){
            if(tiempoSegundos<=1){
              document.getElementById('finalizarJuego').click();
            }
            tiempoSegundos--;
            segundoos++;document.getElementById("tiempo_juego").value=segundoos;console.log(segundoos);
          }else{
            tiempoDeJuego++;
          }
        }, 1000);
      },
    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('connect.alumno', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/tec_cadena/juego_cadena.blade.php ENDPATH**/ ?>