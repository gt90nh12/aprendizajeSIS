<!--             llamar ala plantilla del administrador             -->

<?php $__env->startSection('titulo_pagina', 'Técnica de la concentración'); ?>
<?php $__env->startSection('descripcion_pagina', 'Video de concentración'); ?>
<!-- ************************************************************** -->

<?php $__env->startSection('archivos_style_form'); ?>
<!--        Wizard       -->
<link href="<?php echo e(('assets/plugins/wizard/steps.css'), false); ?>" rel="stylesheet">
<!--        Dropify     -->
<link rel="stylesheet" href="<?php echo e(('assets/plugins/dropify/dist/css/dropify.min.css'), false); ?>">
<!--        Switchery     -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Validation wizard -->
<div class="row" id="validation">
    <div class="col-12">
        <div class="card wizard-content">
            <div class="card-body">
                <h4 class="card-title">Crear el juego</h4>
                <!-- Seccino de errrores-->
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
                <?php echo Form::open(['url' => 'almacenar_tec_concentracion', 'class'=>'validation-wizard wizard-circle',
                'files'=>'true']); ?>

                <?php echo e(csrf_field(), false); ?>

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
                                    <input  id="archivo_seleccionado" name="imagen_juego" class="archivo_seleccionado" type="file" onchange="seleccionar_archivo_imagen()" required="true"/>
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
                            <label for="jobTitle1">Subir archivo: </label>
                            <input type="file" name="cancion" id="input-file-now-custom-1" class="dropify"
                            data-default-file="<?php echo e(('assets/images/imagenes_sistema/music.jpg'), false); ?>" required/>  
                        </div>
                        <div class="col-md-12">
                            <h3 class="btn btn-success vieo-pregunta-boton" onclick="agregarpregunta()">Agregar pregunta</h3>
                            <input type="hidden" id="numero_preguntas_juego" name="juegoNumeroPreguntas" value="1" min="1">
                            <div class="video-concentracion" id="videoconcentracion">
                                <div class="video-concentracion-pregunta">
                                    <div class="form-body">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="tipo_pregunta" class="form_descripcion">Tipo de pregunta<span class="text-danger">*</span></label>
                                                        <select name="tipo_pregunta1" class="form-control required" id="tipo_pregunta1">
                                                            <option value="">Seleccione tipo de pregunta</option>
                                                            <option value="abierta">Abierta</option>
                                                            <option value="cerrada">Cerrada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pregunta">Pregunta<span class="text-danger"></span></label>
                                                        <input type="text" name="pregunta1[]" class="form-control" id="pregunta" value="" required />
                                                    </div>
                                                    <div class="row video-contenedor-respuesta" id="contenedor_respuesta1">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="puntajeRespuesta">Puntaje<span class="text-danger">*</span></label>
                                                                <input type="number" name="puntajeRespuesta1[]" class="form-control" id="puntajeRespuesta" min="1" pattern="^[0-9]+" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <input type="number" pattern="^[0-9]+" min="1" name="puntaje" class="form-control required" required
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
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <h5 class="form_descripcion">Fecha inicio de juego:</h5>
                                        <div class="card">
                                            <input type="date" name="fecha_inicio" class="form-control requiredo" required
                                            data-validation-required-message="El campo fecha de inicio de juego es requerido."
                                            id="fecha_inicio">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <h5 class="form_descripcion">Fecha fin de juego:</h5>
                                    <div class="card">
                                        <input type="date" name="fecha_fin" class="form-control required" required data-validation-required-message="El campo fecha de finalización de juego es requerido."
                                        id="fecha_fin">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <h6>Guardar</h6>
                <section>
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="center-wizard">
                                <div class="card"> <img class="card-img" src="../assets/images/background/socialbg.jpg" alt="Card image">
                                    <div class="card-img-overlay card-inverse social-profile d-flex ">
                                        <div class="align-self-center"> <img src="" class="img-circle" width="100">
                                            <h4 class="card-title">Juego Video</h4>
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
<!--Custom JavaScript -->
<script src="<?php echo e(('assets/plugins/moment/moment.js'), false); ?>"></script>
<script src="<?php echo e(('assets/plugins/wizard/jquery.steps.min.js'), false); ?>"></script>
<script src="<?php echo e(('assets/plugins/wizard/jquery.validate.min.js'), false); ?>"></script>


<!-- Sweet-Alert & wizard -->
<script src="<?php echo e(('assets/plugins/sweetalert/sweetalert.min.js'), false); ?>"></script>
<script src="<?php echo e(('assets/plugins/wizard/steps.js'), false); ?>"></script>
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
<!-- jQuery file upload -->
<script src="<?php echo e(('assets/plugins/dropify/dist/js/dropify.min.js'), false); ?>"></script>
<script>
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });

</script>

<!-- ============================================================== -->
<!-- Incluir un campo de texto mas -->
<!-- ============================================================== -->
<script src="<?php echo e(('assets/plugins/dff/dff.js'), false); ?>" type="text/javascript"></script>

<script>
    var tipoPregunta = document.getElementById('tipo_pregunta1');
    tipoPregunta.addEventListener('change',
        function () {
            var selectedOption = this.options[tipoPregunta.selectedIndex];
            var contenedorRespuesta = document.getElementById('contenedor_respuesta1');
            if (selectedOption.value == "cerrada") {
                contenedorRespuesta.innerHTML = `
                <div class="col-md-12">
                <div class="row contador_general"> 
                <div class="col-sm-6 nopadding">
                <h5 class="form_descripcion">Respuesta <span><p class="btn btn-success" onclick="agregarrespuestacerrada(1)"><i class="fa fa-plus"></i></p></span></h5>
                </div>
                </div>               
                </div>`;
            } else if (selectedOption.value == "abierta"){
                contenedorRespuesta.innerHTML = `
                <div class="col-md-12">
                <div class="form-group">
                <label for="respuestaabierta">Respuesta<span class="text-danger">*</span></label>
                <input type="text" name="respuestaabierta1" class="form-control" id="respuestaabierta" value="" required>
                </div>
                </div>`;
            }
        }); 
    </script>
    <script>
        function agregarpregunta(){
            room++;document.getElementById('numero_preguntas_juego').value=room;
            var objTo = document.getElementById('videoconcentracion')
            var divpregunta = document.createElement("div");
            divpregunta.setAttribute("class", "form-group removeclass" + room);
            var rdiv = 'removeclass' + room;
            divpregunta.innerHTML = '<div class="form-body"><div class="card-body"><div class="row"><p> Pregunta <span><button class="btn btn-danger" type="button" onclick="eliminar_artista_de_cancion(' + room + ');"> <i class="fa fa-minus"></i> </button></span></p><div class="col-md-12"><div class="form-group"><label for="tipo_pregunta" class="form_descripcion">Tipo de pregunta<span class="text-danger">*</span></label><div class="row"><div class="col-md-8"><select name="tipo_pregunta'+ room +'" class="form-control required" id="tipo_pregunta'+room+'" required="true"><option value="">Seleccione tipo de pregunta</option><option value="abierta">Abierta</option><option value="cerrada">Cerrada</option></select></div><div class="col-md-4"><p onclick="agregarrespuestacerrada('+room+')" class="btn waves-effect waves-light btn-rounded btn-outline-success">Adicionar pregunta</p></div></div></div></div></div><div class="row"><div class="col-md-12"><div class="form-group"><label for="pregunta'+room+'">Pregunta<span class="text-danger"></label><input type="text" name="pregunta'+ room +'[]" class="form-control" id="pregunta'+room+'" required="true"></div></div></div><div class="row video-contenedor-respuesta" id="contenedor_respuesta' + room + '" required="true"></div><div class="row"><div class="col-md-12"><div class="form-group"><label for="puntajeRespuesta">Puntaje<span class="text-danger">*</span></label><input type="number" name="puntajeRespuesta'+room+'[]" class="form-control" id="puntajeRespuesta" min="1" pattern="^[0-9]+" required></div></div></div></div></div>'; 
            objTo.appendChild(divpregunta)
        }
        function agregarrespuestacerrada(numerorespuesta){
         console.log(numerorespuesta);
         var tipopregunta= document.getElementById("tipo_pregunta" + numerorespuesta).value
         console.log(tipopregunta);
         var contenedor_respuesta= document.getElementById("contenedor_respuesta" + numerorespuesta)
         console.log(contenedor_respuesta);
         if (tipopregunta == "cerrada") {
            contenedor_respuesta.innerHTML = `
            <div class="col-md-12">
            <div class="row contador_general"> 
            <div class="col-sm-6 nopadding">
            <h5 class="form_descripcion">Respuesta<span><button class="btn btn-success" type="button" onclick="agregarrespuestasmultiples(` + numerorespuesta + `);"><i class="fa fa-plus"></i></button></span></h5>
            </div>
            </div>
            </div>`;
        }
        if (tipopregunta == "abierta"){
            contenedor_respuesta.innerHTML = `
            <div class="col-md-12">
            <div class="form-group">
            <label for="respuestaabierta">Respuesta<span class="text-danger">*</span></label>
            <input type="text" name="respuestaabierta` + numerorespuesta + `" class="form-control" id="respuestaabierta" value="" required>
            </div>
            </div>`;
        }
    }
    function agregarrespuestasmultiples(numerorespuesta){
        var contenedor_respuesta= document.getElementById("contenedor_respuesta" + numerorespuesta)
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "video-cerrada-respuesta form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = `
        <!-- Row -->
        <div class="row respuesta_cerrada">
        <div class="col-sm-12 nopadding">
        <div class="row">
        <div class="col-sm-5 nopadding">
        <p for="respuesta" class="card-subtitle">Respuesta<span class="text-danger">*</span></p>
        </div>
        <div class="col-sm-7 nopadding">
        <textarea class="form-control" rows="3" name="respuesta`+ numerorespuesta +`[]" required="true"></textarea>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-5 nopadding">
        <label for="respuesta" class="card-subtitle">Respuesta correcta</label>
        </div>
        <div class="col-sm-7 nopadding">
        <select name="opcionRespuesta`+numerorespuesta+`[]" class="form-control" required="true">
        <option value="">Seleccione respuesta</option>
        <option value="verdadero">Verdadero</option>
        <option value="falso">Falso</option>
        </select>
        </div>
        </div>
        </div>
        </div>`;
        contenedor_respuesta.appendChild(divtest)
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


<?php echo $__env->make('connect.ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/tec_concentracion/create.blade.php ENDPATH**/ ?>