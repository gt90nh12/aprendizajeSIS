



<!-- Step 1 -->
<h6>Descripción</h6>
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="titulo">Título :</label>
                <input type="text" name="titulo" class="form-control required" id="titulo"
                    value="<?php echo e($tecConcentracion->titulo); ?>" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="descripcion">Descripción :</label>
                <textarea name="descripcion" id="descripcion" rows="6" class="form-control required"
                    required><?php echo e($tecConcentracion->descripcion); ?></textarea>
            </div>
        </div>
    </div>
</section>
<!-- Step 2 -->
<h6>Contenido</h6>
<section>
    <div class="row">
        <div class="col-md-6">
            <label for="jobTitle1">Cargar archivo: </label>
            <input type="file" name="cancion" id="input-file-now-custom-1" class="dropify"
                data-default-file="http://localhost/aprendizaje/storage/videos/tecnica_concentracion/<?php echo e($tecConcentracion->archivo_id); ?>" />
            <input type="hidden" name="archivo_id" value="<?php echo e($tecConcentracion->archivo_id); ?>" required>

            <!-- Row -->
            <label for="videoUrl1">Cantante de la canción: </label>
            <input type="text" class="form-control" name="cantante" id="videoUrl1"
                value="<?php echo e($tecConcentracion->cantante); ?>" required>
            <!-- Row -->

            <!-- Row -->
            <label for="videoUrl1">Artistas cantantes: </label><br />
            <div id="artista_cancion"></div>
            <div class="row">
                <div class="col-sm-12 nopadding">
                    <div class="form-group">
                        <div class="input-group-append">
                            <button class="btn btn-success mover-derecha" type="button"
                                onclick="adicionar_artistasCantantes();"><i class="fa fa-plus"></i></button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Row -->
        </div>
        <div class="col-md-6">
            <label for="videoUrl1">Letra de la canción: </label><br />
            <textarea name="letra" id="letras_musica" class="form-control" rows="7"
                placeholder="Ingrese la letra de la canción" required><?php echo e($tecConcentracion->letra); ?></textarea>
            <!-- Row -->
            <label for="videoUrl1">Seleccionar las palabras de la canción: </label><br />
            <div id="palabra_de_cancion"></div>
            <div class="row">
                <div class="col-sm-12 nopadding">
                    <div class="form-group">
                        <div class="input-group-append ">
                            <button class="btn btn-success mover-derecha" type="button" onclick="education_fields();"><i
                                    class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
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
                    data-validation-required-message="El campo nivel de complejidad es requerido." id="nivel">
                    <option value="">Seleccione genero</option>
                    <?php if($tecConcentracion->nivel == "bajo"): ?>
                    <option value="bajo" selected>Bajo</option>
                    <option value="medio">Medio</option>
                    <option value="alto">Alto</option>
                    <?php elseif($tecConcentracion->nivel == "medio"): ?>
                    <option value="bajo">Bajo</option>
                    <option value="medio" selected>Medio</option>
                    <option value="alto">Alto</option>
                    <?php elseif($tecConcentracion->nivel == "alto"): ?>
                    <option value="bajo">Bajo</option>
                    <option value="medio">Medio</option>
                    <option value="alto" selected>Alto</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="puntuacion">Puntuación:</label>
                <input type="number" name="puntaje" class="form-control required" id="puntuacion"
                    value="<?php echo e($tecConcentracion->puntaje); ?>" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="tiempo_juego">Tiempo de juego:</label>
                <input type="time" name="tiempo" class="form-control required" id="tiempo_juego"
                    value="<?php echo e($tecConcentracion->tiempo); ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="fecha_inicio">Fecha inicio de juego:</label>
                <input type="datetime" name="fecha_inicio" class="form-control requiredo" id="fecha_inicio"
                    value="<?php echo e($tecConcentracion->fecha_inicio); ?>" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="fecha_fin">Fecha fin de juego:</label>
                <input type="datetime" name="fecha_fin" class="form-control required" id="fecha_fin"
                    value="<?php echo e($tecConcentracion->fecha_fin); ?>" required>
            </div>
        </div>
    </div>
</section>
<!-- Step 4 -->
<h6>Guardar</h6>
<section>
    <div class="row">
        <div class="col-md-12">
            <input type="submit" value="Guardar">
        </div>
    </div>
</section>


<?php /**PATH C:\laragon\www\aprendizaje\resources\views/tec_concentracion/_form_tec_concentracion.blade.php ENDPATH**/ ?>