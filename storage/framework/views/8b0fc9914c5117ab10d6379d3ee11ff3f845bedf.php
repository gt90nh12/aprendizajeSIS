<!--             llamar ala plantilla del administrador             -->

<?php $__env->startSection('titulo_pagina', 'Técnica de la Cadena'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario crear el juego de la cadena'); ?>
<!-- ************************************************************** -->

<?php $__env->startSection('archivos_style_form'); ?>
<!-- wizard -->
<link href="<?php echo e(('assets/plugins/wizard/steps.css')); ?>" rel="stylesheet">
<!-- bootstrap-fileinput -->

<link href="<?php echo e(('assets/plugins/fileinput/css/fileinput.min.css')); ?>" media="all" rel="stylesheet" type="text/css" />
<!--        Dropify     -->
<link rel="stylesheet" href="<?php echo e(('assets/plugins/dropify/dist/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Validation wizard -->
<div class="row" id="validation">
    <div class="col-12">
        <div class="card wizard-content">
            <div class="card-body">
                <h4 class="card-title">Crear técnica</h4>
                
                
                    <!-- Seccion de errrores-->
                    
                    <?php echo Form::open(['url' => 'almacenar_tec_cadena', 'class'=>'validation-wizard wizard-circle',
                    'files'=>'true']); ?>

                    <?php echo e(csrf_field()); ?>

                    <?php if(Session::has('message')): ?>
                    <div class="container">
                        <div class="alert alert-<?php echo e(Session::get('typealert')); ?>" style="display:none;">
                            <?php echo e(Session::get('message')); ?>

                            <?php if($errors->any()): ?>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                            <script>
                                $('.alert').slideDown();
                                setTimeout(function () {
                                    $('.alert').slideUp();
                                }, 10000);

                            </script>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- Step 1 -->
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
                                <label for="titulo">Imagen juego:</label>
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
                    <!-- Step 2 -->
                    <h6>Contenido</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                
                                            </div>
                                            <label for="file-es" role="button">Seleccionar Archivos</label>
                                            <input id="file-es" name="imagen[]" type="file" multiple>
                                            <SMALL class="form-text text-muted">Seleccionar archivos: jpg, png hasta un máximo de 25.</SMALL>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Reglas</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nivel">Nivel de complejidad :</label>
                                    <select name="nivel" id="select" class="form-control required" required
                                    data-validation-required-message="El campo nivel de complejidad es requerido."
                                    id="nivel">
                                    <option value="">Seleccione nivel</option>
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
                <!-- Step 4 -->
                <h6>Guardar</h6>
                <section>
                   <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="center-wizard">
                            <div class="card"> <img class="card-img" src="../assets/images/background/socialbg.jpg" alt="Card image">
                                <div class="card-img-overlay card-inverse social-profile d-flex ">
                                    <div class="align-self-center"> <img src="" class="img-circle" width="100">
                                        <h4 class="card-title">Técnica de la cadena</h4>
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




<?php $__env->stopSection(); ?>

<?php $__env->startSection('archivos_script_form'); ?>
<!-- wizard -->
<script src="<?php echo e(('assets/plugins/wizard/jquery.steps.min.js')); ?>"></script>
<script src="<?php echo e(('assets/plugins/wizard/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(('assets/plugins/wizard/steps.js')); ?>"></script>
<script>
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

</script>
<!-- bootstrap-fileinput -->
<script src="<?php echo e(('assets/plugins/fileinput/js/fileinput.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(('assets/plugins/fileinput/js/locales/es.js')); ?>" type="text/javascript"></script>	

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
        var contadores_tipos = function(archivo) {
            for(var i=0; i<tipos.length;i++) {
                if(archivo.indexOf(tipos[i])!=-1) {
                    contadores[i]+=1;
                    break;	
                }
            }
        };
        $('#file-es').fileinput({
            language: 'es',
            uploadUrl: '/recibe-fileinput.php',
            uploadAsync: false,
            maxFileCount: 25,
            maxFileSize: 75,
            removeFromPreviewOnError: true,
            allowedFileExtensions : tipos
        });
        $('#file-es').on('filecleared', function(event) {
            $('div.alert').empty();
            $('div.alert').hide();		
        });
        $('#file-es').on('filebatchuploadsuccess', function(event, data, previewId, index) {
            var ficheros = data.files;
            var respuesta = data.response;
            var total = data.filescount;
            var mensaje;
            var archivo;
            var total_tipos='';
            
            reset_contadores();
            mensaje='<p>'+total+ ' ficheros almacenados en la carpeta: '+respuesta.dirupload+'<br><br>';
            mensaje+='Ficheros procesados:</p><ul>';
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
            const botonEnviar = document.querySelectorAll('[href="#finish"]');
            const adicionarBotonEnviar = botonEnviar[0].classList.add("ocultar");
            console.log(botonEnviar);
            botonEnviar[0].parentNode.removeChild(botonEnviar[0]);
            /****************************************************************/
        </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('connect.ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/tec_cadena/create.blade.php ENDPATH**/ ?>