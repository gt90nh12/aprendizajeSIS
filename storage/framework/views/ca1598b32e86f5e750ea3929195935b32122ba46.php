<!--             llamar ala plantilla del administrador             -->

<?php $__env->startSection('titulo_pagina', 'Perfil administrador'); ?>
<?php $__env->startSection('descripcion_pagina', 'Registre los datos'); ?>
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
                
                <!-- Seccion de errrores-->
                
                <?php echo Form::open(['url' => 'registro_administrador', 'class'=>'validation-wizard wizard-circle',
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
                <h6>Registrar persona</h6>                    
               
               <section>                          
               <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                       <h5 class="form_descripcion">Nombre <span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="nombre" class="form-control" required
                               data-validation-required-message="El nombre es requerido">
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <h5 class="form_descripcion">Apellido Paterno</h5>
                       <div class="controls">
                           <input type="text" name="apellido_paterno" class="form-control">
                       </div>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                       <h5 class="form_descripcion">Apellido Materno</h5>
                       <div class="controls">
                           <input type="text" name="apellido_materno" class="form-control">
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <h5 class="form_descripcion">Genero <span class="text-danger">*</span></h5>
                       <div class="controls">
                           <select name="genero" id="select" class="form-control" required
                               data-validation-required-message="El genero es requerido">
                               <option value="">Seleccione genero</option>
                               <option value="varon">Masculino</option>
                                   <option value="mujer">Femenino</option>
                           </select>
                       </div>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                       <h5 class="form_descripcion">Cedula de Identidad <span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="number" name="ci" class="form-control" required
                               data-validation-required-message="La cedula de identidad es requerido">
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <h5 class="form_descripcion">Fecha de nacimiento<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="date"  name="fecha_nacimiento" class="form-control" required
                               data-validation-required-message="La fecha de nacimiento es requerido">
                       </div>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                       <h5 class="form_descripcion">Numero de celular</h5>
                       <div class="controls">
                           <input type="number" name="celular" class="form-control">
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <h5 class="form_descripcion">Correo electronico<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="email"  name="correo_electronico" class="form-control" required
                               data-validation-required-message="El correo electronico es requerido">
                           <input type="hidden" name="estado">
                       </div>
                   </div>
               </div>
           </div>
                                        
               </section>                
                <!-- Step 2 -->
                <h6>Asignar nivel</h6>                    
                <section>
                <div class="row justify-content-center">
            	   <div class="col-lg-6 col-md-6">
               		<div class="form-group">
                    <h5 class="form_descripcion">Imagen usuario</h5>
                    <div class="card">
                        <label for="input-file-now">
                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                <i class="fas fa-exclamation"></i>
                            </button>
                            OJO Solo archivos png
                        </label>
                        <input type="file" id="input-file-now" name="direccion_imagen" class="dropify"
                            data-allowed-file-extensions="png" required />
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Perfil usuario</h5>
                    <div class="card">
                        <label for="input-file-now">
                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                <i class="fas fa-cog"></i>
                            </button>
                            Debe seleccionar un perfil 
                        </label>
                        <div class="input-group">
                            <ul class="icheck-list">
                                <li>
                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-1"
                                        name="rol" value="1">
                                    <label for="minimal-radio-1">Director</label>
                                </li>
                                <li>
                                    <input tabindex="8" type="radio" class="check" id="minimal-radio-2"
                                        name="rol" value="2" checked>
                                    <label for="minimal-radio-2">Profesor</label>
                                </li>
                                <li>
                                    <input type="radio" class="check" id="minimal-radio-disabled" disabled>
                                    <label for="minimal-radio-disabled">Estudiante</label>
                                </li>
                                <li>
                                    <input type="radio" class="check" id="minimal-radio-disabled-checked" checked
                                        disabled>
                                    <label for="minimal-radio-disabled-checked">Padre de &amp; familia</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Numero de cédula de identidad</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="ti-id-badge "></i>
                            </span>
                        </div>
                       
                        <input type="text" name="persona_id" class="form-control" required>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo electronico</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="ti-email "></i>
                            </span>
                        </div>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="mdi mdi-account"></i>
                            </span>
                        </div>
                        <input type="text" name='name' class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="mdi mdi-key-variant"></i>
                            </span>
                        </div>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                </div>
                
            </div>
        </div>                    
             
                </section>
              
                <!-- Step 3 -->                
                <h6>Informacion</h6>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Guardar">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('connect.perfil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/connect/registro_usuario.blade.php ENDPATH**/ ?>