<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'Pueba general'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario registrar prueba'); ?>
<!-- *********************************************** -->

<?php $__env->startSection('archivos_style_form'); ?>
    <!--        Wizard       -->
    <link href="<?php echo e(('assets/plugins/wizard/steps.css')); ?>" rel="stylesheet">
    <!--        Dropify     -->
    <link rel="stylesheet" href="<?php echo e(('assets/plugins/dropify/dist/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Crear pregunta</h4>
                </div>
                <!-- Seccino de errrores-->
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
                                setTimeout(function () { $('.alert').slideUp(); }, 10000);
                            </script>
                        </div>
                    </div>
                <?php endif; ?>
                <?php echo Form::open(['url' => 'almacenar_prueba', 'class'=>'validation-wizard wizard-circle', 'files'=>'true', 'novalidate'=>'true']); ?>

                    <?php echo $__env->make('prueba._form_prueba', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('archivos_script_form'); ?>
    <!-- jQuery file upload -->
    <script src="<?php echo e(('assets/plugins/dropify/dist/js/dropify.min.js')); ?>"></script>
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
    <script src="<?php echo e(('assets/plugins/dff/dff.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('connect.ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/prueba/crear.blade.php ENDPATH**/ ?>