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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(('assets/images/cabecera.png '), false); ?>">
    <title>Aprendizaje</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(('assets/plugins/bootstrap/css/bootstrap.min.css '), false); ?>" rel="stylesheet">
    <?php $__env->startSection('archivos_style_form'); ?>
    <?php echo $__env->yieldSection(); ?>
    <!-- image CSS -->
    <link rel="stylesheet" href="<?php echo e(('assets/plugins/dropify/dist/css/dropify.min.css'), false); ?>">
    <!-- checked - radio CSS -->
    <link href="<?php echo e(('assets/plugins/icheck/skins/all.css'), false); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(('assets/css/style.css '), false); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo e(('assets/css/colors/blue.css '), false); ?>" id="theme" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(('assets/plugins/jquery/jquery.min.js'), false); ?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js ') }}"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js ') }}"></script>
<![endif]-->
    <!---- Estilos_personalizados ---->
    <link href="<?php echo e(('css/estilos_personalizados.css'), false); ?>" id="theme" rel="stylesheet">
<style type="text/css">
.espacio{
    margin-right: 10px;
    margin-left: 10px;
}
.center{
    width:100%;
    text-align: center;
    
}
#videoconcentracion{
            height: 500px;
            overflow: auto;
            background: white;
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
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo e(('assets/images/logo-icon.png '), false); ?>" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo e(('assets/images/logo-light-icon.png '), false); ?>" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <!-- <img src="<?php echo e(('assets/images/logo-text.png '), false); ?>" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo text -->
                            <!-- <img src="<?php echo e(('assets/images/logo-light-text.png '), false); ?>" class="light-logo" alt="homepage" /></span> </a> -->
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
    <!-- ============================================================== -->
    <!-- End Messages -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Messages -->
    <!-- ============================================================== -->
    <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
            href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                class="mdi mdi-view-grid"></i></a>
        <div class="dropdown-menu animated bounceInDown">
            <ul class="mega-dropdown-menu row">
                <li class="col-lg-3 col-xlg-2 mb-4">
                    <h4 class="mb-3">CAROUSEL</h4>
                    <!-- CAROUSEL -->
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="container"> <img class="d-block img-fluid"
                                        src="<?php echo e(('assets/images/big/img1.jpg '), false); ?>" alt="First slide"></div>
                            </div>
                            <div class="carousel-item">
                                <div class="container"><img class="d-block img-fluid"
                                        src="<?php echo e(('assets/images/big/img2.jpg '), false); ?>" alt="Second slide"></div>
                            </div>
                            <div class="carousel-item">
                                <div class="container"><img class="d-block img-fluid"
                                        src="<?php echo e(('assets/images/big/img3.jpg '), false); ?>" alt="Third slide"></div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                                class="sr-only">Previous</span> </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span
                                class="sr-only">Next</span> </a>
                    </div>
                    <!-- End CAROUSEL -->
                </li>
                <li class="col-lg-3 mb-4">
                    <h4 class="mb-3">ACCORDION</h4>
                    <!-- Accordian -->
                    <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Collapsible Group Item #1
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim
                                    eiusmod high. </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Collapsible Group Item #2
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim
                                    eiusmod high life accusamus terry richardson ad squid. </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim
                                    eiusmod high life accusamus terry richardson ad squid. </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-lg-3  mb-4">
                    <h4 class="mb-3">CONTACT US</h4>
                    <!-- Contact -->
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleTextarea" rows="3"
                                placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </li>
                <li class="col-lg-3 col-xlg-4 mb-4">
                    <h4 class="mb-3">List style</h4>
                    <!-- List style -->
                    <ul class="list-style-none">
                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                You can give link</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                Give link</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                Another Give link</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                Forth link</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                Another fifth link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </li>
    <!-- ============================================================== -->
    <!-- End Messages -->
    <!-- ============================================================== -->
    </ul>
    <!-- ============================================================== -->
    <!-- User profile and search -->
    <!-- ============================================================== -->
    <ul class="navbar-nav my-lg-0">
        <li class="nav-item hidden-sm-down">
            <form class="app-search">
                <input type="text" class="form-control" placeholder="Buscar"> <a class="srh-btn"><i
                        class="ti-search"></i></a> </form>
        </li>

        <li class="nav-item dropdown">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm float-right ml-2"><i
                    class="ti-settings text-white"></i></button>
        </li>
    </ul>
    </div>
    </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User profile -->
            <div class="user-profile">
                <!-- User profile image -->
                <div class="profile-img"> <img
                        src="http://localhost/aprendizaje/public/img/perfil_usuario/<?php echo e(auth()->user()->direccion_imagen, false); ?>"
                        alt="user" /></div>
                <!-- User profile text-->
                <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown"
                        role="button" aria-haspopup="true" aria-expanded="true">
                        <?php echo e(auth()->user()->name, false); ?>

                        <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <a href="#" class="dropdown-item"><i class="ti-user"></i> Mi perfil</a>
                        <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i
                                class="ti-settings"></i> Configuración</a>
                        <div class="dropdown-divider"></div> <a href="<?php echo e(url('/cerrar_session'), false); ?>" class="dropdown-item"><i
                                class="fa fa-power-off"></i> Cerrar sesión</a>
                    </div>
                </div>
            </div>
            <!-- End User profile text-->
            <!-- Sidebar navigation-->
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- <li class="nav-small-cap">UNIDAD EDUCATIVA</li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-city"></i><span
                                class="hide-menu">Colegio<span
                                    class="label label-rounded label-success">3</span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="#">Resultados técnica</a></li>
                            <li><a href="index3.html">Material aprendizaje</a></li>
                            <li><a href="index2.html">Profesores</a></li>
                        </ul>
                    </li> -->
                    
                    <li class="nav-devider"></li>
                    <li class="nav-small-cap">TEST DE APRENDIZAJE</li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="ti-book"></i><span
                                class="hide-menu">Test general</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(route('prueba_estudiante','general'), false); ?>">General</a></li>
                            <li><a href="<?php echo e(route('prueba_estudiante','memoria'), false); ?>">Memoria</a></li>
                            <li><a href="<?php echo e(route('prueba_estudiante','concentracion'), false); ?>">Concentración</a></li>
                            <li><a href="<?php echo e(route('prueba_estudiante','calculo'), false); ?>">Cálculo</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">TECNICAS DE APRENDIZAJE</li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-link-variant"></i><span
                                class="hide-menu">Técnica de la
                                memoria</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(url('/listar_tecnicas'), false); ?>" class="">Cadena</a></li>
                            <!-- <li><a href="<?php echo e(url('/listar_tecnicas_vinculo'), false); ?>" class="">Vinculo</a></li> -->
                            <!-- <li><a href="form-layout.html">Categorizacion</a></li> -->
                            <!-- <li><a href="form-addons.html">Visualizacion</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-grid"></i><span
                                class="hide-menu">Tec. de concentración</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(url('/listar_tecnicas_cocentracion'), false); ?>" class="">Videos de concentración</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-animation"></i><span
                                class="hide-menu">Técnica de calculo</span></a>
                                <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(url('/listar_tecnicas_calculo'), false); ?>">Juego emparejar</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- End Sidebar scroll-->
        <!-- Bottom points-->
        <div class="sidebar-footer">
            <!-- item-->
            <a href="" class="link" data-toggle="tooltip" title="Configuración"><i class="ti-settings"></i></a>
            <!-- item-->
            <a href="" class="link" data-toggle="tooltip" title="Correo"><i class="mdi mdi-gmail"></i></a>
            <!-- item-->
            <a href="" class="link" data-toggle="tooltip" title="Cerrar la sesión"><i class="mdi mdi-power"></i></a>
        </div>
        <!-- End Bottom points-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
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
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/1.jpg '), false); ?>"
                                        alt="user-img" class="img-circle"> <span>Varun Dhavan <small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/2.jpg '), false); ?>"
                                        alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small
                                            class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/3.jpg '), false); ?>"
                                        alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small
                                            class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/4.jpg '), false); ?>"
                                        alt="user-img" class="img-circle"> <span>Arijit Sinh <small
                                            class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/5.jpg '), false); ?>"
                                        alt="user-img" class="img-circle"> <span>Govinda Star <small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/6.jpg '), false); ?>"
                                        alt="user-img" class="img-circle"> <span>John Abraham<small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/7.jpg '), false); ?>"
                                        alt="user-img" class="img-circle"> <span>Hritik Roshan<small
                                            class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="<?php echo e(('assets/images/users/8.jpg '), false); ?>"
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
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(('assets/plugins/jquery/jquery.min.js '), false); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(('assets/plugins/bootstrap/js/popper.min.js '), false); ?>"></script>
    <script src="<?php echo e(('assets/plugins/bootstrap/js/bootstrap.min.js '), false); ?>"></script>
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(('assets/plugins/datatables/media/css/dataTables.bootstrap4.css'), false); ?>">
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(('js/jquery.slimscroll.js '), false); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(('js/waves.js '), false); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(('js/sidebarmenu.js '), false); ?>"></script>
    <!--stickey kit -->
    <script src="<?php echo e(('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js '), false); ?>"></script>
    <!--************** Custom JavaScript  validacion de formulario de registro **************-->
    <script src="<?php echo e(('js/custom.min.js '), false); ?>"></script>
    <!-- checked - radio -->
    <script src="<?php echo e(('assets/plugins/icheck/icheck.min.js'), false); ?>"></script>
    <script src="<?php echo e(('assets/plugins/icheck/icheck.init.js'), false); ?>"></script>
    
    <!--*************************************************************************************-->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo e(('assets/plugins/styleswitcher/jQuery.style.switcher.js '), false); ?>"></script>

    <?php $__env->startSection('archivos_script_form'); ?>
    <?php echo $__env->yieldSection(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\aprendizaje\resources\views/connect/alumno.blade.php ENDPATH**/ ?>