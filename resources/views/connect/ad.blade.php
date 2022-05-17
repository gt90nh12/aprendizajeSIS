<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ ('assets/images/cabecera.png ') }}">
    <title>Aprendizaje</title>
    <link href="{{ ('assets/plugins/bootstrap/css/bootstrap.min.css ') }}" rel="stylesheet">
    @section('archivos_style_form')
    @show
    <link rel="stylesheet" href="{{ ('assets/plugins/dropify/dist/css/dropify.min.css') }}">
    <link href="{{ ('assets/plugins/icheck/skins/all.css') }}" rel="stylesheet">
    <link href="{{ ('assets/css/style.css ') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ ('assets/css/colors/blue.css ') }}" id="theme" rel="stylesheet">
    <script src="{{ ('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!---- Estilos_personalizados ---->
    <link href="{{ ('css/estilos_personalizados.css') }}" id="theme" rel="stylesheet">
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
    <div class="preloader"> <svg class="circular" viewBox="25 25 50 50"> <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg></div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light"><div class="navbar-header"><a class="navbar-brand" href="index.html"><b><img src="{{ ('assets/images/logo-icon.png ') }}" alt="homepage" class="dark-logo" /><img src="{{ ('assets/images/logo-light-icon.png ') }}" alt="homepage" class="light-logo" /></b><span></div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown"><button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm float-right ml-2"><i class="ti-settings text-white"></i></button>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="profile-img"> <img src="http://localhost/aprendizaje/public/img/perfil_usuario/{{ auth()->user()->direccion_imagen }}" alt="user" /></div>
                    <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> {{ auth()->user()->name }} <span class="caret"></span></a>
                        <div class="dropdown-menu animated flipInY"> <a href="#" class="dropdown-item"><i class="ti-user"></i> Mi perfil</a>
                            <div class="dropdown-divider"></div> 
                            <a href="#" class="dropdown-item"><i class="ti-settings"></i> Configuración</a>
                            <div class="dropdown-divider"></div> 
                            <a href="{{url('/cerrar_session')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Cerrar sesión</a>
                        </div>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">UNIDAD EDUCATIVA</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-address-book"></i><span class="hide-menu">Estudiante<span class="label label-rounded label-success">1</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/listar_estudiante')}}">Listar</a></li>
                                <!-- <li><a href="{{url('/PlantelDocente')}}">Plantel Docente</a></li>
                                <li><a href="index2.html">Padres de Familia</a></li> -->
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">TEST DE APRENDIZAJE</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="ti-book"></i><span class="hide-menu">Test general</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/crear_prueba')}}">Crear</a></li>
                                <li><a href="{{url('/listar_prueba')}}">Listar</a></li>
                                <!-- <li><a href="index3.html">Estudiantes</a></li> -->
                            </ul>
                        </li>
                        <li class="nav-small-cap">TECNICAS DE APRENDIZAJE</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-link-variant"></i><span class="hide-menu">Técnica de la memoria</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#" class="has-arrow">Cadena </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('/listar_tec_cadena')}}">Listar</a></li>
                                        <li><a href="{{url('crear_tec_cadena')}}">Crear</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="has-arrow">Visualizacion</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('listar_tec_vinculo')}}">Listar</a></li>
                                        <li><a href="{{url('crear_tec_vinculo')}}">Crear</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-grid"></i><span class="hide-menu">Téc. de concentración</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#" class="has-arrow">Videos de concentración</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('/listar_tec_concentracion')}}">Listar</a></li>
                                        <li><a href="{{url('/crear_tec_concentracion')}}">Crear</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-animation"></i><span class="hide-menu">Técnica de calculo</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#" class="has-arrow">Juego emparejar</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <!-- <li><a href="{{url('/listar_tec_cadena')}}">Listar</a></li> -->
                                        <li><a href="{{url('crear_tec_calculo')}}">Crear</a></li>
                                        <li><a href="{{url('listar_tec_calculo')}}">Listar</a></li>
                                    </ul>
                                </li><!-- <li><a href="form-layout.html">Categorizacion</a></li><li><a href="form-addons.html">Visualizacion</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="sidebar-footer">
                <a href="" class="link" data-toggle="tooltip" title="Configuración"><i class="ti-settings"></i></a>
                <a href="" class="link" data-toggle="tooltip" title="Correo"><i class="mdi mdi-gmail"></i></a>
                <a href="" class="link" data-toggle="tooltip" title="Cerrar la sesión"><i class="mdi mdi-power"></i></a>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor mb-0 mt-0">@yield('titulo_pagina')</h3>
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> --}}
                            <li class="breadcrumb-item active">@yield('descripcion_pagina')</li>
                        </ol>
                    </div>
                </div>
                @section('content')
                @show
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Panel de servicio <span><i class="ti-close right-side-toggle"></i></span>
                        </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="mt-3">
                                <li><b>Barra superior</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block mt-4"><b>Barra lateral</b></li>
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
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2022 Sistema de Aprendizaje </footer>
        </div>
    </div>
    <script src="{{ ('assets/plugins/jquery/jquery.min.js ') }}"></script>
    <script src="{{ ('assets/plugins/bootstrap/js/popper.min.js ') }}"></script>
    <script src="{{ ('assets/plugins/bootstrap/js/bootstrap.min.js ') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ ('assets/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">
    <script src="{{ ('js/jquery.slimscroll.js ') }}"></script>
    <script src="{{ ('js/waves.js ') }}"></script>
    <script src="{{ ('js/sidebarmenu.js ') }}"></script>
    <script src="{{ ('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js ') }}"></script>
    <script src="{{ ('js/custom.min.js ') }}"></script>
    <script src="{{ ('assets/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ ('assets/plugins/icheck/icheck.init.js') }}"></script>
    <script src="{{ ('assets/plugins/styleswitcher/jQuery.style.switcher.js ') }}"></script>
    @section('archivos_script_form')
    @show
</body>
</html>
