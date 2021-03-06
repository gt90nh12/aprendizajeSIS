<div class="form-body">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
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
            <div class="col-lg-6">
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
        <label for="prueba" class="form_descripcion">Seleccione la prueba<span class="text-danger">*</span></label>
        <select id="Seleccione_Prueba" name="prueba" class="form-control required" required data-validation-required-message="Seleccione la prueba">
            <option value="">Seleccione tipo de prueba</option>
            <option value="general">test general</option>
            <option value="memoria">Memoria</option>
            <option value="concentracion">Concentracion</option>
            <option value="calculo">Calculo</option>
        </select>
    </div>
</div>
<div class="col-md-12 div-ocultar" id="seccionPregunta">
    <div class="row">
        <div class="col-xlg-2 col-lg-4 col-md-6 col-xs-12">
            <div class="radio radio-success">
                <input type="radio" name="SeccionPrueba" id="concentracionSeccion" value="concentracion">
                <label for="concentracionSeccion"> Concentración </label>
            </div>
        </div>
        <div class="col-xlg-2 col-lg-4 col-md-6 col-xs-12">
            <div class="radio radio-success">
                <input type="radio" name="SeccionPrueba" id="memoriaSeccion" value="memoria">
                <label for="memoriaSeccion"> Memoria </label>
            </div>
        </div>
        <div class="col-xlg-2 col-lg-4 col-md-6 col-xs-12">
            <div class="radio radio-success">
                <input type="radio" name="SeccionPrueba" id="calculoSeccion" value="calculo">
                <label for="calculoSeccion"> Cálculo </label>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="tipo_pregunta" class="form_descripcion">Tipo de pregunta<span class="text-danger">*</span></label>
        <select name="tipo_pregunta" class="form-control required" id="tipo_pregunta">
            <option value="">Seleccione tipo de pregunta</option>
            <option value="abierta">Abierta</option>
            <option value="cerrada">Cerrada</option>
            <option value="multiple">Seleccion multiple</option>
        </select>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="pregunta">Pregunta<span class="text-danger"> *<input type="radio" name="imagen_pregunta"id="agregar_imagen_pregunta">
            <label for="agregar_imagen_pregunta"id="pregunta_agregar_imagen"></label></span></label>
            <input type="text" name="pregunta" class="form-control" id="pregunta" value="" required>
            <div id="contenedor_imagen_pregunta">
                <div class="form-group">
                    <br>
                    <h5 class="form_descripcion">Imagen de pregunta
                        <span class="text-danger contenedor_imagen"><input type="radio" name="imagen_pregunta" id="quitar_imagen_pregunta"><label for="quitar_imagen_pregunta" id="pregunta_quitar_imagen">X</label></span></h5>
                        <input type="file" name="imagen_pregunta" id="input-file-now-custom-1" class="dropify"data-default-file="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="contenedor_respuesta">
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="puntaje">Puntaje<span class="text-danger">*</span></label>
                <input type="number" name="puntaje" class="form-control" id="puntaje" value="" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="tiempo">Tiempo de respuesta<span class="text-danger">*</span></label>
                <input type="time" name="tiempo_respuesta" class="form-control" id="tiempo" value="" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="orden">Orden<span class="text-danger">*</span></label>
                <input type="number" name="orden" class="form-control requiredo" id="orden" value="" required>
            </div>
        </div>
        <div class="form-actions">
            <div class="card-body">
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Guardar</button>
                <a href="<?php echo e(route('listar_persona'), false); ?>" class="btn btn-dark">Cancelar</a>
            </div>
        </div>
    </div>
    <script>
        var pruebaSeleccionada = document.getElementById('Seleccione_Prueba');
        pruebaSeleccionada.addEventListener('change',
            function(){
                if (pruebaSeleccionada.value == "general") {
                    console.log("general");
                    document.getElementById('seccionPregunta').classList.remove("div-ocultar");
                    document.getElementById('seccionPregunta').classList.add("div-mostrar");
                }else{
                    document.getElementById('seccionPregunta').classList.remove("div-mostrar");
                    document.getElementById('seccionPregunta').classList.add("div-ocultar");
                }
            }
            );
        var tipoPregunta = document.getElementById('tipo_pregunta');
        tipoPregunta.addEventListener('change',
            function () {
                var selectedOption = this.options[tipoPregunta.selectedIndex];
                var contenedorRespuesta = document.getElementById('contenedor_respuesta');
                var contenedorPuntaje = document.getElementById('contenedor_puntaje');
                if (selectedOption.value == "multiple") {
                    contenedorRespuesta.innerHTML = `
                    <div class="col-md-12">
                    <h5 class="form_descripcion">Respuesta <span><button class="btn btn-success" type="button" onclick="adicionar_respuesta_multiple();"><i class="fa fa-plus"></i></button></span></h5>
                    <!-- Row -->
                    <div id="respuesta_multiple">
                    <div class="row">
                    <div class="col-sm-1 nopadding">
                    <input type="checkbox" name="checkbox1">
                    </div>
                    <div class="col-sm-8 nopadding">
                    <input type="text" class="form-control" name="opcion[]" value="" placeholder="Ingresé respuesta" required>
                    </div>
                    <div class="col-sm-2 nopadding">
                    <input type="number" class="form-control" name="puntajemultiple[]" value="" placeholder="Ingrese Puntaje" required>
                    </div>
                    <div class="col-sm-1 nopadding">
                    <div class="input-group-append">
                    <button class="btn btn-danger" type="button" onclick="eliminar_seleccionMultiple(1);"> <i class="fa fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="clear"></div>
                    </div><br>
                    </div>
                    <!-- End Row -->
                    </div>`;
                    contenedorPuntaje.innerHTML = "";
                } else if (selectedOption.value == "cerrada") {
                    contenedorRespuesta.innerHTML = `
                    <div class="col-md-12">
                    <div class="row contador_general"> 
                    <div class="col-sm-6 nopadding">
                    <h5 class="form_descripcion">Agregar <span><button class="btn btn-success" type="button" onclick="adicionar_respuesta_cerrada()"><i class="fa fa-plus"></i></button></span></h5>
                    </div>
                    <div class="col-sm-6 nopadding" id="contadorFinal">
                    <label class="btn btn-info" id="contador-respuesta-cerrada">2</label>
                    <input type="hidden" name="respuestaCerradaNumero" id="numero-respuesta-cerrada" value="2">
                    </div>
                    </div>
                    <!-- Opciones de respuesta -->
                    <div class="row opcion-respuesta-multiple">
                    <div class="col-sm-4 nopadding">
                    <div class="row">
                    <div class="col-sm-4 nopadding">
                    <label for="vinieta" class="card-subtitle">Viñeta<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-sm-8 nopadding">
                    <select name="vinieta" class="form-control" id="vinieta">
                    <option value="">Seleccione tipo de viñeta</option>
                    <option value="numero">123...</option>
                    <option value="letras">abc...</option>
                    <option value="radio">○</option>
                    <option value="checked">■</option>
                    </select>
                    </div>
                    </div>  
                    </div>
                    <div class="col-sm-4 nopadding">
                    <div class="row">
                    <div class="col-sm-5 nopadding">
                    <label for="respuesta" class="card-subtitle">Presentacion<span
                    class="text-danger">*</span></label>
                    </div>
                    <div class="col-sm-7 nopadding opcion-general-presentacion">
                    <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label opcion_vertical" for="customRadio1"> </label>
                    </div>
                    <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label opcion_horizontal" for="customRadio2"> </label>
                    </div>
                    </div>
                    </div> 
                    </div>
                    <div class="col-sm-4 nopadding">
                    </div>
                    </div>
                    <!-- Finalizar Opciones de respuesta -->
                    <!-- Row -->
                    <div id="respuesta_cerrada">
                    <div class="row respuesta_cerradas">
                    <div class="col-sm-7 nopadding">
                    <div class="row">
                    <div class="col-sm-5 nopadding">
                    <p for="respuesta" class="card-subtitle">Respuesta<span class="text-danger">*</span></p>
                    </div>
                    <div class="col-sm-7 nopadding">
                    <textarea name="respuesta0" class="form-control" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-5 nopadding">
                    <label for="respuesta" class="card-subtitle">Respuesta correcta</label>
                    </div>
                    <div class="col-sm-7 nopadding">
                    <div class="row opcion-respuesta">
                    <div class="custom-control custom-radio">
                    <input type="radio" name="opcionRespuesta0" class="custom-control-input" id="customCheck10" value="verdadero">
                    <label class="custom-control-label" for="customCheck10">Verdadero</label>
                    </div>
                    <div class="custom-control custom-radio">
                    <input type="radio" name="opcionRespuesta0" class="custom-control-input" id="customCheck20" value="falso">
                    <label class="custom-control-label" for="customCheck20">Falso</label>
                    </div>
                    <div class="custom-control custom-radio">
                    <input type="radio" name="opcionRespuesta0" class="custom-control-input" id="customCheck30" value="ninguna">
                    <label class="custom-control-label" for="customCheck30">Ninguna</label>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-sm-4 nopadding">
                    <div class="imagen_archivo">
                    <p class="descripcion_imagen">Subir archivo </p>
                    <div class="boton_imagen">
                    <input name="imagen_respuesta_cerrada0"  id="archivo_seleccionado0" class="archivo_seleccionado" type="file" onchange="seleccionar_archivo_imagen(0)" />
                    </div>
                    </div>
                    <div id="vista_imagen">
                    <div id="ver_archivo0" class="ver_archivo"></div>
                    </div>
                    </div>
                    </div>
                    <div class="row respuesta_cerradas">
                    <div class="col-sm-7 nopadding">
                    <div class="row">
                    <div class="col-sm-5 nopadding">
                    <p for="respuesta" class="card-subtitle">Respuesta<span class="text-danger">*</span></p>
                    </div>
                    <div class="col-sm-7 nopadding">
                    <textarea  name="respuesta1" class="form-control" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-5 nopadding">
                    <label for="respuesta" class="card-subtitle">Respuesta correcta</label>
                    </div>
                    <div class="col-sm-7 nopadding">
                    <div class="row opcion-respuesta">
                    <div class="custom-control custom-radio">
                    <input type="radio" name="opcionRespuesta1" class="custom-control-input" id="customCheck11" value="verdadero">
                    <label class="custom-control-label" for="customCheck11">Verdadero</label>
                    </div>
                    <div class="custom-control custom-radio">
                    <input type="radio" name="opcionRespuesta1" class="custom-control-input" id="customCheck21" value="falso">
                    <label class="custom-control-label" for="customCheck21">Falso</label>
                    </div>
                    <div class="custom-control custom-radio">
                    <input type="radio" name="opcionRespuesta1" class="custom-control-input" id="customCheck31" value="ninguna">
                    <label class="custom-control-label" for="customCheck31">Ninguna</label>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-sm-4 nopadding">
                    <div class="imagen_archivo">
                    <p class="descripcion_imagen">Subir archivo </p>
                    <div class="boton_imagen">
                    <input  id="archivo_seleccionado1" name="imagen_respuesta_cerrada1" class="archivo_seleccionado" type="file" onchange="seleccionar_archivo_imagen(1)" />
                    </div>
                    </div>
                    <div id="vista_imagen">
                    <div id="ver_archivo1" class="ver_archivo"></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <!-- End Row -->
                    </div>`;
                } else if (selectedOption.value == "abierta"){
                    contenedorRespuesta.innerHTML = `
                    <div class="col-md-12">
                    <div class="form-group">
                    <label for="respuestaabierta">Respuesta<span class="text-danger">*</span></label>
                    <input type="text" name="respuetaabierta" class="form-control" id="respuestaabierta" value="" required>
                    </div>
                    </div>`;
                }
            }); 

var agregarImagenPregunta = document.getElementById("agregar_imagen_pregunta");
var quitarImagenPregunta = document.getElementById("quitar_imagen_pregunta");
agregarImagenPregunta.addEventListener('change', function (e) {
    var contenedorImagen = document.getElementById("contenedor_imagen_pregunta");
    if (e.target.checked) {
        contenedorImagen.style.display = "block";
    }
});
quitarImagenPregunta.addEventListener('change', function (e) {
    var contenedorImagen = document.getElementById("contenedor_imagen_pregunta");
    if (e.target.checked) {
        contenedorImagen.style.display = "none";
    }
});

function seleccionar_archivo_imagen(numero) {
    var filesSelected = document.getElementById("archivo_seleccionado" + numero).files;
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
                    document.getElementById("ver_archivo" + numero).innerHTML = newImage.outerHTML;
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
                    document.getElementById("ver_archivo" + numero).innerHTML = newImage.outerHTML;
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        } else {
            alert('Archivo no permitido. Seleccione una imagen en formato PNG o JPEG.')
            document.getElementById("archivo_seleccionado" + numero).value = ''
        }
    }

</script>
<?php /**PATH C:\laragon\www\aprendizaje\resources\views/prueba/_form_prueba.blade.php ENDPATH**/ ?>