<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'Unidad Educativa'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario registrar de Unidad Educativa'); ?>
<!-- *********************************************** -->
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Crear registro</h4>
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
                                    setTimeout(function(){$('.alert').slideUp(); }, 10000);
                                </script>
                            </div>
                        </div>
                    <?php endif; ?>
                
                <form method="post" action="<?php echo e(route('almacenar_escuela')); ?>" class="mt-5" enctype="multipart/form-data" novalidate>
                    <?php echo e(csrf_field()); ?>

                    <?php echo $__env->make('escuela._form_escuela', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('connect.ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/escuela/crear.blade.php ENDPATH**/ ?>