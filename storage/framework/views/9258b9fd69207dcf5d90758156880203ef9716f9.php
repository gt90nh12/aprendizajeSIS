<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'Persona'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario actualizar persona'); ?>
<!-- *********************************************** -->
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">actualizar registro</h4>
                </div>
                <form action="<?php echo e($action); ?>" class="mt-5" novalidate>
                    <?php echo $__env->make('persona._form_persona', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('connect.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/persona/actualizar.blade.php ENDPATH**/ ?>