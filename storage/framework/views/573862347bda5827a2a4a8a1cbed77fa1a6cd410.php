<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'Estudiante'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario registrar estudiante'); ?>
<!-- *********************************************** -->
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Crear registro</h4>
                </div>
                <form action="<?php echo e(url('/almacenar_estudiante')); ?>" class="mt-5" novalidate>
                    <?php echo $__env->make('estudiantes._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </div>
        </div>
    </div>
                                
<?php $__env->stopSection(); ?>


<?php echo $__env->make('connect.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/estudiantes/crear.blade.php ENDPATH**/ ?>