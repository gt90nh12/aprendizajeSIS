<!-- plantilla administrador -->

<?php $__env->startSection('titulo_pagina', 'Roles usuario'); ?>
<?php $__env->startSection('descripcion_pagina','Formulario crear rol de usuario'); ?>
<!-- -->
<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('connect.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/role/create.blade.php ENDPATH**/ ?>