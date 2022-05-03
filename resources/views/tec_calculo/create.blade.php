<!--             llamar ala plantilla del administrador             -->
@extends('connect.ad')
@section('titulo_pagina', 'Técnica del calculo')
@section('descripcion_pagina', 'Formulario de crear juego del calculo')
<!-- ************************************************************** -->

@section('archivos_style_form')
<!-- wizard -->
<link href="{{ ('assets/plugins/wizard/steps.css') }}" rel="stylesheet">
<!-- bootstrap-fileinput -->
{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
<link href="{{ ('assets/plugins/fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
<!--        Dropify     -->
<link rel="stylesheet" href="{{ ('assets/plugins/dropify/dist/css/dropify.min.css') }}">
@stop

@section('content')
<!-- Validation wizard -->
<div class="row" id="validation">
    <div class="col-12">
        <!-- Seccino de errrores-->

        <div class="card wizard-content">
            <div class="card-body">
                <h4 class="card-title">Crear juego</h4>
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
                {{-- <h6 class="card-subtitle">Debe ingresar todos los datos para crear el juego.</h6> --}}
                <!-- {{-- <form action="#" class="validation-wizard wizard-circle"> --}} -->
                    <!-- Seccino de errrores-->
                <!-- <form method="post" action="{{route('almacenar_tec_calculo')}}" class="mt-5"
                    enctype="multipart/form-data" novalidate> -->
                    {!! Form::open(['url' => 'almacenar_tec_calculo', 'class'=>'validation-wizard wizard-circle',
                    'files'=>'true']) !!}
                    {{ csrf_field() }}
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
                    <h6>Descripción</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="titulo">Título :</label>
                                    <input type="text" name="titulo" class="form-control required" required
                                    data-validation-required-message="El campo título es requerido." id="titulo">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="titulo">Imagen juego :</label>
                                <div class="imagen_archivo">
                                    <p class="descripcion_imagen">Subir archivo </p>
                                    <div class="boton_imagen">
                                        <input  id="archivo_seleccionado" name="imagen_juego" class="archivo_seleccionado" type="file" onchange="seleccionar_archivo_imagen()" />
                                    </div>
                                </div>
                                <div id="vista_imagen">
                                    <div id="ver_archivo" class="ver_archivo"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción :</label>
                                    <textarea name="descripcion" id="descripcion" rows="6" class="form-control required"
                                    required
                                    data-validation-required-message="El campo descripcion es requerido."></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h6>Contenido</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="titulo">Pregunta de juego :</label>
                                    <input type="text" name="tabla_pregunta" class="form-control required" required
                                    data-validation-required-message="La pregunta del juego es requerido.">
                                </div>
                            </div>         
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="espacio">Adicionar celda: <span> </span> </label>
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button"
                                            onclick="adicionar_respuesta_tabla()"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class ="row">
                                    <div class="col-6">
                                        <label>Pregunta celda: </label>
                                        <div id="pregunta_celda"></div>
                                    </div>
                                    <div class="col-6">
                                        <label>Respuesta celda: </label>
                                        <div id="respuesta_celda"></div>
                                    </div>
                                    <div id="respuesta_tabla"></div>
                                </div>
                            </div>
                        </section>
                        <h6>Reglas</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <h5 class="form_descripcion">Año de escolaridad:</h5>
                                                <div class="card">
                                                    <select name="anio_escolaridad" class="form-control" required="" data-validation-required-message="Seleccione una persona">
                                                        <option value="" class="placeholderselect" disabled="" selected="">Seleccione año de escolaridad.
                                                        </option>
                                                        <option value="PRIMERO">PRIMERO</option>
                                                        <option value="SEGUNDO">SEGUNDO</option>
                                                        <option value="TERCERO">TERCERO</option>
                                                        <option value="CUARTO">CUARTO</option>
                                                        <option value="QUINTO">QUINTO</option>
                                                        <option value="SEXTO">SEXTO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <h5 class="form_descripcion">Paralelo:</h5>
                                            <div class="card">
                                                <select name="escolaridad_paralelo" class="form-control" required="" data-validation-required-message="Seleccione una persona">
                                                    <option value="" class="placeholderselect" disabled="" selected="">Seleccione paralelo.
                                                    </option>
                                                    <option value="A">Todos</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nivel">Nivel de complejidad :</label>
                                        <select name="nivel" id="select" class="form-control required" required data-validation-required-message="El campo nivel de complejidad es requerido." id="nivel">
                                            <option value="">Seleccione genero</option>
                                            <option value="bajo">Bajo</option>
                                            <option value="medio">Medio</option>
                                            <option value="alto">Alto</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="puntuacion">Puntuación:</label>
                                        <input type="number" name="puntaje" class="form-control required" required
                                        data-validation-required-message="El campo puntuación de juego es requerido."
                                        id="puntuacion">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tiempo_juego">Tiempo de juego:</label>
                                        <input type="time" name="tiempo" class="form-control required" required
                                        data-validation-required-message="El campo tiempo de juego es requerido."
                                        id="tiempo_juego">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_inicio">Fecha inicio de juego:</label>
                                        <input type="date" name="fecha_inicio" class="form-control requiredo" required
                                        data-validation-required-message="El campo fecha de inicio de juego es requerido."
                                        id="fecha_inicio">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_fin">Fecha fin de juego:</label>
                                        <input type="date" name="fecha_fin" class="form-control required" required
                                        data-validation-required-message="El campo fecha de finalización de juego es requerido."
                                        id="fecha_fin">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h6>Guardar</h6>
                        <section>
                         <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="center-wizard">
                                    <div class="card"> 
                                        <img class="card-img" src="../assets/images/background/socialbg.jpg" alt="Card image">
                                        <div class="card-img-overlay card-inverse social-profile d-flex ">
                                            <div class="align-self-center"> <img src="#" class="img-circle" width="100">
                                                <h4 class="card-title">Juego emparejar</h4>
                                                <h6 class="card-subtitle"><input type="submit" class="btn btn-success" value="Guardar"></h6>
                                                <p class="text-white">Los datos an sido registrados correctamente. se guardara la información en la base de datos. </p>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row">
    <div class="row">
        <div class="col-5">
            <input type="text" class="form-control" placeholder = "Ingrese pregunte celda">
        </div>
        <div class="col-1">
            <p>=</p>
        </div>
        <div class="col-5"> 
        <input type="text" class="form-control" placeholder = "Ingrese respuesta celda">
        </div>
        <div class="col-1">
            <div class="input-group-append">
            <button class="btn btn-danger" type="button" onclick="eliminar_artista_de_cancion(' + room + ');">
                <i class="fa fa-minus"></i> 
             </button>
             </div> 
        </div>
    </div>
</div>  -->

    <!-- <div class="row">
        <div class="col-sm-12 nopadding">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="artistas[]" value="" placeholder="Ingresé el artista" required>
                    <div class="input-group-append"> 
                        <button class="btn btn-danger" type="button" onclick="eliminar_artista_de_cancion(' + room + ');"> <i class="fa fa-minus"></i> </button>
                    </div>
                </div>
                <div class="clear"></div>
            </row>'; -->
            <!-- <div class="row">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder = "Ingrese pregunte celda">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder = "Ingrese respuesta celda">
                    </div>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-danger" type="button" onclick="eliminar_artista_de_cancion(' + room + ');"> <i class="fa fa-minus"></i> </button>
                </div>
            </div> -->
            <!-- <div class="row"><div class="row"><div class="col-5"><input type="text" class="form-control" placeholder = "Ingrese pregunte celda"></div><div class="col-1"><p>=</p></div><div class="col-5"><input type="text" class="form-control" placeholder = "Ingrese respuesta celda"></div><div class="col-1"> </div></div><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="eliminar_artista_de_cancion(' + room + ');"> <i class="fa fa-minus"></i> </button></div></div> -->




            @stop

            @section('archivos_script_form')
            <!-- wizard -->
            <script src="{{ ('assets/plugins/wizard/jquery.steps.min.js') }}"></script>
            <script src="{{ ('assets/plugins/wizard/jquery.validate.min.js') }}"></script>
            <script src="{{ ('assets/plugins/wizard/steps.js') }}"></script> 
            <script>
                let room = 0;
                function adicionar_respuesta_tabla() {
                    room++;
                    var objTo = document.getElementById('respuesta_tabla')
        // var pregunta_tabla = document.getElementById('pregunta_celda')
        // var respuesta_tabla = document.getElementById('respuesta_celda')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        // tabla.innerHTML = '<input= "text"'>
        divtest.innerHTML = '<div class="row"><div class="row"><div class="col-5"><input type="text" name="pregunta[]" class="form-control" placeholder = "Ingrese pregunte celda"></div><div class="col-1"><p>=</p></div><div class="col-5"><input type="text" name="respuesta[]" class="form-control" placeholder = "Ingrese respuesta celda"></div><div class="col-1"><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="eliminar_artista_de_cancion(' + room + ');"> <i class="fa fa-minus"></i> </button></div> </div></div></div>'; 
        objTo.appendChild(divtest)
    }
    $(document).ready(function() {
        jQuery.extend(jQuery.validator.messages, {
            required: "Este campo es obligatorio.",
            remote: "Por favor, rellena este campo.",
            email: "Por favor, escribe una dirección de correo válida",
            url: "Por favor, escribe una URL válida.",
            date: "Por favor, escribe una fecha válida.",
            dateISO: "Por favor, escribe una fecha (ISO) válida.",
            number: "Por favor, escribe un número entero válido.",
            digits: "Por favor, escribe sólo dígitos.",
            creditcard: "Por favor, escribe un número de tarjeta válido.",
            equalTo: "Por favor, escribe el mismo valor de nuevo.",
            accept: "Por favor, escribe un valor con una extensión aceptada.",
            maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
            rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
            range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
            max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
            min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
        });
    });

    function eliminar_artista_de_cancion(rid) {
        $('.removeclass' + rid).remove();
    }

</script>
<!-- bootstrap-fileinput -->
<script src="{{ ('assets/plugins/fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
<script src="{{ ('assets/plugins/fileinput/js/locales/es.js') }}" type="text/javascript"></script>	
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
<script>
        // Tipos de archivos admitidos por su extensión
        var tipos = ['jpeg','jpg','png','gif'];
        // Contadores de archivos subidos por tipo
        var contadores=[0,0,0,0];
        // Reinicia los contadores de tipos subidos
        var reset_contadores = function() {
            for(var i=0; i<tipos.length;i++) {
                contadores[i]=0;
            }
        };
        // Incrementa el contador de tipo según la extensión del archivo subido	
        var contadores_tipos = function(archivo) {
            for(var i=0; i<tipos.length;i++) {
                if(archivo.indexOf(tipos[i])!=-1) {
                    contadores[i]+=1;
                    break;	
                }
            }
        };
        // Inicializamos el plugin fileinput:
        //  traducción al español
        //  script para procesar las peticiones de subida
        //  desactivar la subida asíncrona
        //  máximo de ficheros que se pueden seleccionar	
        //  Tamaño máximo en Kb de los ficheros que se pueden seleccionar
        //  no mostrar los errores de tipo de archivo (cuando el usuario selecciona un archivo no permitido)
        //  tipos de archivos permitidos por su extensión (array definido al principio del script)
        $('#file-es').fileinput({
            language: 'es',
            uploadUrl: '/recibe-fileinput.php',
            uploadAsync: false,
            maxFileCount: 25,
            maxFileSize: 75,
            removeFromPreviewOnError: true,
            allowedFileExtensions : tipos
        });
        // Evento filecleared del plugin que se ejecuta cuando pulsamos el botón 'Quitar'
        //    Vaciamos y ocultamos el div de alerta
        $('#file-es').on('filecleared', function(event) {
            $('div.alert').empty();
            $('div.alert').hide();		
        });
        // Evento filebatchuploadsuccess del plugin que se ejecuta cuando se han enviado todos los archivos al servidor
        //    Mostramos un resumen del proceso realizado
        //    Carpeta donde se han almacenado y total de archivos movidos
        //    Nombre y tamaño de cada archivo procesado
        //    Totales de archivos por tipo
        $('#file-es').on('filebatchuploadsuccess', function(event, data, previewId, index) {
            var ficheros = data.files;
            var respuesta = data.response;
            var total = data.filescount;
            var mensaje;
            var archivo;
            var total_tipos='';
            
            reset_contadores(); // Resetamos los contadores de tipo de archivo
            // Comenzamos a crear el mensaje que se mostrará en el DIV de alerta
            mensaje='<p>'+total+ ' ficheros almacenados en la carpeta: '+respuesta.dirupload+'<br><br>';
            mensaje+='Ficheros procesados:</p><ul>';
            // Procesamos la lista de ficheros para crear las líneas con sus nombres y tamaños
            for(var i=0;i<ficheros.length;i++) {
                if(ficheros[i]!=undefined) {
                    archivo=ficheros[i];				
                    tam=archivo.size / 1024;
                    mensaje+='<li>'+archivo.name+' ('+Math.ceil(tam)+'Kb)'+'</li>';
                contadores_tipos(archivo.name);  // Incrementamos el contador para el tipo de archivo subido
            } 
        };

        mensaje+='</ul><br/>';
            // Línea que muestra el total de ficheros por tipo que se han subido
            for(var i=0; i<contadores.length; i++)  total_tipos+='('+contadores[i]+') '+tipos[i]+', ';
            // Apaño para eliminar la coma y el espacio (, ) que se queda en el último procesado
        total_tipos=total_tipos.substr(0,total_tipos.length-2);
        mensaje+='<p>'+total_tipos+'</p>';
            // Si el total de archivos indicados por el plugin coincide con el total que hemos recibido en la respuesta del script PHP
            // mostramos mensaje de proceso correcto
            if(respuesta.total==total) mensaje+='<p>Coinciden con el total de archivos procesados en el servidor.</p>';
            else mensaje+='<p>No coinciden los archivos enviados con el total de archivos procesados en el servidor.</p>';
            // Una vez creado todo el mensaje lo cargamos en el DIV de alerta y lo mostramos
            $('div.alert').html(mensaje);
            $('div.alert').show();
        });
        // Ocultamos el div de alerta donde se muestra un resumen del proceso
        $('div.alert').hide();

    </script>
    <script>
        $(document).ready(function() {
            $("#input-44").fileinput({
                uploadUrl: '/file-upload-batch/2',
                maxFilePreviewSize: 10240
            });
        });
    </script>
    <script>
        function seleccionar_archivo_imagen() {
            var filesSelected = document.getElementById("archivo_seleccionado").files;
            var formato_imagen
            formato_imagen = filesSelected[0]
            if (formato_imagen.type === "image/png") {
                if (filesSelected.length > 0) {
                    var fileToLoad = filesSelected[0];
                    var fileReader = new FileReader();
                    fileReader.onload = function (fileLoadedEvent) {
                            var srcData = fileLoadedEvent.target.result; // <--- data: base64
                            var newImage = document.createElement('img');
                            newImage.src = srcData;
                            document.getElementById("ver_archivo").innerHTML = newImage.outerHTML;
                        }
                        fileReader.readAsDataURL(fileToLoad);
                    }
                } else if (formato_imagen.type === "image/jpeg") {
                    if (filesSelected.length > 0) {
                        var fileToLoad = filesSelected[0];
                        var fileReader = new FileReader();
                        fileReader.onload = function (fileLoadedEvent) {
                            var srcData = fileLoadedEvent.target.result; // <--- data: base64
                            var newImage = document.createElement('img');
                            newImage.src = srcData;
                            document.getElementById("ver_archivo").innerHTML = newImage.outerHTML;
                        }
                        fileReader.readAsDataURL(fileToLoad);
                    }
                } else {
                    alert('Archivo no permitido. Seleccione una imagen en formato PNG o JPEG.')
                    document.getElementById("archivo_seleccionado").value = ''
                }
            }
        </script>
        <script type="text/javascript">
            const monitoriarFechas = setInterval(() => {
                var fechaInicialJuego = document.getElementById("fecha_inicio").value;
                var fechaFinalJuego = document.getElementById("fecha_fin").value;
                if(fechaFinalJuego != "" && fechaInicialJuego != ""){
                    if( fechaFinalJuego < fechaInicialJuego){
                        console.log("La fecha final debe ser mayor a la fecha inicial");
                        document.getElementById("fecha_fin").value=" ";    
                    }
                } 
                console.log("hola");
            }, 1000);

            /******************* Eliminar el boton enviar *******************/
            // const botonEnviar = document.querySelectorAll('[href="#finish"]');
            // const adicionarBotonEnviar = botonEnviar[0].classList.add("ocultar");
            // console.log(botonEnviar);
            // botonEnviar[0].parentNode.removeChild(botonEnviar[0]);
            /****************************************************************/
        </script>

        @stop
