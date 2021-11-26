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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(('assets/images/cabecera.png ')); ?>">
    <title>Aprendizaje</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(('assets/plugins/bootstrap/css/bootstrap.min.css ')); ?>" rel="stylesheet">
    <?php $__env->startSection('archivos_style_form'); ?>
    <?php echo $__env->yieldSection(); ?>
    <!-- image CSS -->
    <link rel="stylesheet" href="<?php echo e(('assets/plugins/dropify/dist/css/dropify.min.css')); ?>">
    <!-- checked - radio CSS -->
    <link href="<?php echo e(('assets/plugins/icheck/skins/all.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(('assets/css/style.css ')); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo e(('assets/css/colors/blue.css ')); ?>" id="theme" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js ') }}"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js ') }}"></script>
<![endif]-->
    <!---- Estilos_personalizados ---->
    <link href="<?php echo e(('css/estilos_personalizados.css ')); ?>" id="theme" rel="stylesheet">
<style type="text/css">
.espacio{
    margin-right: 10px;
    margin-left: 10px;
}
.center{
    width:100%;
    text-align: center;
    
}
    
</style>
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <!-- <div class="page-wrapper"> -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="text-themecolor mb-0 mt-0"><?php echo $__env->yieldContent('titulo_pagina'); ?></h3>
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active"><?php echo $__env->yieldContent('descripcion_pagina'); ?></li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <?php $__env->startSection('content'); ?>
            <?php echo $__env->yieldSection(); ?>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                    </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="mt-3">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                            <li class="d-block mt-4"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a>
                            </li>
                        </ul>
                        <ul class="mt-3 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/1.jpg ')); ?>"
                                        alt="user-img" class="img-circle"> <span>Varun Dhavan <small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/2.jpg ')); ?>"
                                        alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small
                                            class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/3.jpg ')); ?>"
                                        alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small
                                            class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/4.jpg ')); ?>"
                                        alt="user-img" class="img-circle"> <span>Arijit Sinh <small
                                            class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/5.jpg ')); ?>"
                                        alt="user-img" class="img-circle"> <span>Govinda Star <small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/6.jpg ')); ?>"
                                        alt="user-img" class="img-circle"> <span>John Abraham<small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/7.jpg ')); ?>"
                                        alt="user-img" class="img-circle"> <span>Hritik Roshan<small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/8.jpg ')); ?>"
                                        alt="user-img" class="img-circle"> <span>Pwandeep rajan <small
                                            class="text-success">online</small></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2020 Sistema de Aprendizaje </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- </div> -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(('assets/plugins/jquery/jquery.min.js ')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(('assets/plugins/bootstrap/js/popper.min.js ')); ?>"></script>
    <script src="<?php echo e(('assets/plugins/bootstrap/js/bootstrap.min.js ')); ?>"></script>
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(('assets/plugins/datatables/media/css/dataTables.bootstrap4.css')); ?>">
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(('js/jquery.slimscroll.js ')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(('js/waves.js ')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(('js/sidebarmenu.js ')); ?>"></script>
    <!--stickey kit -->
    <script src="<?php echo e(('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js ')); ?>"></script>
    <!--************** Custom JavaScript  validacion de formulario de registro **************-->
    <script src="<?php echo e(('js/custom.min.js ')); ?>"></script>
    <!-- checked - radio -->
    <script src="<?php echo e(('assets/plugins/icheck/icheck.min.js')); ?>"></script>
    <script src="<?php echo e(('assets/plugins/icheck/icheck.init.js')); ?>"></script>
    
    <!--*************************************************************************************-->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo e(('assets/plugins/styleswitcher/jQuery.style.switcher.js ')); ?>"></script>

    <?php $__env->startSection('archivos_script_form'); ?>
    <?php echo $__env->yieldSection(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\aprendizaje\resources\views/connect/perfil.blade.php ENDPATH**/ ?>