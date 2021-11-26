<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(('assets/images/favicon.png')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(('assets/css/style.css')); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo e(('assets/css/colors/blue.css')); ?>" id="theme" rel="stylesheet">
    <link href="<?php echo e(('assets/css/login.css')); ?>" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->

</head>

<body>
    <?php $__env->startSection('content'); ?>
    <?php echo $__env->yieldSection(); ?>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(('assets/plugins/bootstrap/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(('assets/js/jquery.slimscroll.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(('assets/js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(('assets/js/sidebarmenu.js')); ?>"></script>
    <!--stickey kit -->
    <script src="<?php echo e(('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(('assets/js/custom.min.js')); ?>"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo e(('assets/plugins/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\laragon\www\aprendizaje\resources\views////connect/master.blade.php ENDPATH**/ ?>