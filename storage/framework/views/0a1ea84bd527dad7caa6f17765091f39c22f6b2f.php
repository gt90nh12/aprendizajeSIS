<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'Persona'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario registrar persona'); ?>
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
                <form action="<?php echo e(route('registrar_persona'), false); ?>" class="mt-5" novalidate>
                    <?php echo $__env->make('persona._form_persona', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('connect.administrarUsuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/persona/crear.blade.php ENDPATH**/ ?>