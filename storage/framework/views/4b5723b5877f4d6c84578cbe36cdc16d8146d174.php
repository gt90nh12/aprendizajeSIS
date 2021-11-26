<!--             llamar ala plantilla del administrador             -->

<?php $__env->startSection('titulo_pagina', 'Técnica de la Cadena'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario crear técnica de la cadena'); ?>
<!-- ************************************************************** -->
<?php $__env->startSection('archivos_style_form'); ?>
<link href="<?php echo e(('assets/plugins/wizard/steps.css')); ?>" rel="stylesheet">
<!-- Dropzone css -->
<link href="<?php echo e(('assets/plugins/dropzone-master/dist/dropzone.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Validation wizard -->
<div class="row" id="validation">
    <div class="col-12">
        <div class="card wizard-content">
            <div class="card-body">
                <h4 class="card-title">Crear tecnica</h4>
                
                <form action="#" class="validation-wizard wizard-circle">
                    <!-- Step 1 -->
                    <h6>Descripción</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="titulo">Título :</label>
                                    <input type="text" name="titulo" class="form-control required" required data-validation-required-message="El campo título es requerido." id="titulo">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción :</label>
                                    <textarea name="descripcion" id="descripcion" rows="6"
                                    class="form-control required" required data-validation-required-message="El campo descripcion es requerido."></textarea>
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
                                                <input type="file" name="imagen[]" value="" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Step 3</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nivel">Nivel de complejidad :</label>
                                    <select name="genero" id="select" class="form-control required" required data-validation-required-message="El campo nivel de complejidad es requerido." id="nivel">
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
                                    <input type="number" name="puntuacion" class="form-control required" required data-validation-required-message="El campo puntuación de juego es requerido." id="puntuacion">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tiempo_juego">Tiempo de juego:</label>
                                    <input type="time" name="tiempo_juego" class="form-control required" required data-validation-required-message="El campo tiempo de juego es requerido."  id="tiempo_juego">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha inicio de juego:</label>
                                    <input type="date" name="fecha_inicio" class="form-control requiredo" required data-validation-required-message="El campo fecha de inicio de juego es requerido."  id="fecha_inicio">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fecha_fin">Fecha fin de juego:</label>
                                    <input type="date" name="fecha_fin" class="form-control required"required data-validation-required-message="El campo fecha de finalización de juego es requerido."  id="fecha_fin">
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 4 -->
                    <h6>Step 4</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                               <input type="button" value="Guardar">
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
<!-- Dropzone Plugin JavaScript -->
<script src="<?php echo e(('assets/plugins/dropzone-master/dist/dropzone.js')); ?>"></script>
<!--Custom JavaScript -->
<script src="<?php echo e(('assets/plugins/moment/moment.js')); ?>"></script>
<script src="<?php echo e(('assets/plugins/wizard/jquery.steps.min.js')); ?>"></script>
<script src="<?php echo e(('assets/plugins/wizard/jquery.validate.min.js')); ?>"></script>
<!-- Sweet-Alert  -->
<script src="<?php echo e(('assets/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(('assets/plugins/wizard/steps.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('connect.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/cadena/create.blade.php ENDPATH**/ ?>