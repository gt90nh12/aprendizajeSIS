<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>Aprendizaje</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../favicon.ico">

  <!-- Google Fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="../../assets/space/vendor/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../assets/space/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="../../assets/space/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="../../assets/space/vendor/custombox/dist/custombox.min.css">
  <link rel="stylesheet" href="../../assets/space/vendor/animate.css/animate.min.css">
  <link rel="stylesheet" href="../../assets/space/vendor/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="../../assets/space/vendor/fancybox/jquery.fancybox.css">

  <!-- CSS Space Template -->
  <link rel="stylesheet" href="../../assets/space/css/theme.css">
  <style type="text/css">
    .contenido_principal{
      font-size: 15px;

    }
    .placeholderselect {
      display: none;
    }

    .ocultar_etiqueta {
      display: none;
      visibility: hidden;
      color: blue;
    }

    .contenedor_modal {
      overflow: auto;
    }

    .contenedor_tramites {
      padding: 0;
      margin: 0;
      margin-left: 5%;
      list-style: none;
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      flex-direction: row;
      -webkit-flex-flow: row wrap;
      justify-content: flex-start;
      width: 90%;
    }

    #tramite_items {
      margin-left: 0.5em;
      margin-right: 0.5em;
      margin-bottom: 3em;
      height: 340px;
      width: 250px;
    }

    .contenedor_datos_tramite {
      height: 340px;
      width: 250px;
    }

    .modal_requisito {
      text-align: center;
    }

    .icono_modificar_noticia {
      background-color: white;
      background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAMAAADXqc3KAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAjVBMVEUAAAD/kgD0mgv0mgvzmgzzmwz0mQv0mwvzmwzzmgzzmwz/nwD1mQrzmgz0mgvzmgzzmwz0mgvzmgzzmQz0mgv/qgDzmgz0mgv0mgv0mgvzmgzzmgz/mQD/gADymg3zmw3ymg3zmgzzmgz0mQv0mAvzmwzzmgzymg3zmgz/gADzmgzzmwzxmw7zmgwAAAB/Jkg/AAAALXRSTlMAB4bf3IKyh1f75wgy47P1Ql38e58DuPQwtPKvBQQ6Znmx8y1IkeqhVgKshDg3I4gPAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB+QBEBYQH/MZTX0AAACDSURBVCjP1dFJGoIwEITRijPOs4ioOIJi3f96hmRld1/AWr4/X28CqLlWu9N12tGjX98Ig8SHodTROJaJvD+dzYHFkivpZCjrjfJYxP0tw3YpjPd+e/eXjjSLfsh/+AicMuv9uYhFOi4MRbm7sim3XDjuzfnC+OEH+Syrlw7v+mMo8AXcdhiWKvwcMAAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMC0wMS0xNlQyMjoxNjozMSswMDowMGoTljsAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjAtMDEtMTZUMjI6MTY6MzErMDA6MDAbTi6HAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==');
      background-repeat: no-repeat;
      background-position: center;
      outline: 1px solid orange;
      background-size: 24px;
      margin: 5px;
      padding: 0px;
      border: 0px;
      height: 32px;
      width: 32px;
    }

    .icono_alta_noticia {

      background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAclBMVEUAAAAV1VUaz1YAqlUX0lYY0VgY0VkX0V0Y0VgY0lgg32AY0VcZ0lYY0VgY0VgSyFsY0Vge0loY0VgZ0VgY0lgX0Vgc1VUX0VkZ0FgY0VgY0VgY0VgY0VgY0lgRzFUY0VkV1VUY0VgY0VgW01kY0VgAAAA2TcXlAAAAJHRSTlMAGDsDRPO+C/a0CLg+9MYOzBH6hnduEkLF4P79gGsPwQzCsxe+QJf0AAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB+QBEBYYBl+rb7UAAAB/SURBVDjLY2CgKmBkYsYrz8KqwsaOT55DRUWFk4C8igoXAXluXPI8vGB5Pv7BLS8giN9/QsIiWICoGIM4RB4XkGCQxCuvIkVIgTQhK9jgjuSQweZIWTmEN+VxJwWYCgXKVSjSVgXUt0oMhFRwEVCBJ9lDMo4CPgUMygSyHnkAAHqxJ173iASVAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIwLTAxLTE2VDIyOjI0OjA2KzAwOjAwvCwZagAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMC0wMS0xNlQyMjoyNDowNiswMDowMM1xodYAAAAZdEVYdFNvZnR3YXJlAHd3dy5pbmtzY2FwZS5vcmeb7jwaAAAAAElFTkSuQmCC');
      background-repeat: no-repeat;
      background-position: center;
      outline: 1px solid #10D257;
      background-size: 24px;
      -moz-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      transform: rotate(90deg);
      margin: 5px;
      height: 32px;
      width: 32px;
    }

    .icono_baja_noticia {
      background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAMAAADXqc3KAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAZlBMVEUAAADRNBrRMxjSMhjRNxvRMxjRMxj/AADRMxe/QADRMxjQMxrPMBXRMxjQMhfRMxfRMxjQNhvRMxjRMxjQMxjRNBjRMxjRMxjRMxjRMhfRMxjQMxjRMhfRMxjRMxjTNRrRMxgAAACo4K3bAAAAIHRSTlMAJ9PKHOXUAe8E90Yl+Ezk+Sb03duA2PryevVBQu7SHeFgYgIAAAABYktHRACIBR1IAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAB3RJTUUH5AEQFhgPJnfXEQAAAGlJREFUKM9jYCAbMDIxs2AVZ1VQYGPHLq7AwYldnIsbQ5wHJM7LhynODxQXoFxcEGS+gpAwKhARZRBTwArEcUkIQI2SQDdKEmq5lDSWYILIyFBJBhyIWO0By8hy4pDBFlFAGTlmeQaKAACUjBHeDWYpMgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMC0wMS0xNlQyMjoyNDoxNSswMDowMEFuA2kAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjAtMDEtMTZUMjI6MjQ6MTUrMDA6MDAwM7vVAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==');
      background-repeat: no-repeat;
      background-position: center;
      outline: 1px solid #D23011;
      -moz-transform: rotate(270deg);
      -o-transform: rotate(270deg);
      -webkit-transform: rotate(270deg);
      transform: rotate(270deg);
      margin: 5px;
      height: 32px;
      width: 32px;
    }
    .cuadro_texto_noticia{
      width: 90%;
      margin-left: 5%;
    }
    .titulo_noticia{
      font-weight: bold;
    }


    /*---------- ESTILOS PARA MOSTRAR LA IMAGEN INICIO -----------*/
    .disenio_imagen{
     display: flex;
     flex-direction: start;
   }
   .imagen_archivo {
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfkARENNiFZafgGAAABQklEQVRIx+2UPUsDQRCGnz37nI2IEqwUSaFcL/6A+BdsrEQQa6P+jDRa29oEwUo0iNpoIRYimkKURIgWAWt3LM6cu3t3cB/YiDPV3t377Mx7w8B/KMBjkRm8nErNA+doGOUMKZhtfMUeqwjPfOasYIQpFLvQQ9gs1P4WQtdjArgtBLgBJuPWLXHIFU3GsnIEoR6dViKDnvCt76rss2w9qSOIDVD0DY93LPkjgmbdBdgtjFuFzxvyU6YBRdNCgDM+fT6MU8eRk4ywPdiOGhhQNYo3c9hIggeg2OCOAUfUUuQ/iBgg4IVjKpZ1nZQh1qy5gIB3BOEyQqTLQ8SBCQh4i16FiOTi44kgNL5vH+Y1cxnlohBAUM586qz7IQSUiLx76DcAr6X0XY9WKUALfNqFl+oJlXCtLzBbYK3fc1H2H/6N+AJ13ANVI5Z7igAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMC0wMS0xN1QxMzo1NDozMyswMDowMEY/SWIAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjAtMDEtMTdUMTM6NTQ6MzMrMDA6MDA3YvHeAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==");
    background-repeat:no-repeat;
    border-radius: 6px;
    margin-left: 10px;
    height: 32px;
    width: 32px;
  }

  #archivo_seleccionado {
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
  }

  .vista_imagen {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .img_general {
    height: 95%;
    width: 95%;
  }

  /*Estilos del selector de imagenes */
  #ver_archivo{
    outline: 1px solid rgb(117, 117, 117);
    height: 220px;
    width: 250px;
  }
  #ver_archivo img{
    margin-top:5%;
    margin-left: 5%;
    height: 90%;
    width: 90%;
  }
  /*********************************/


  /*---------- ESTILOS PARA MOSTRAR LA IMAGEN FIN -----------*/

  /* estilos footer*/
  .pie {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #000;
    height: 50px;

    padding-left: 5%;
    padding-right: 5%;
    width: 90;
  }

  .pie_redes {
    display: flex;
  }
  .gam{
    color:#fff;
  }
</style>
</head>

<body>
  <!-- Skippy -->
  <a id="skippy" class="sr-only sr-only-focusable u-skippy" href="#content">
    <div class="container">
      <span class="u-skiplink-text">Skip to main content</span>
    </div>
  </a>
  <!-- End Skippy -->

  <!-- ========== HEADER ========== -->
  <header id="header" class="u-header u-header--modern u-header--bordered u-header--bg-transparent u-header--white-nav-links u-header--sticky-top-lg">
    <div class="u-header__section">
      <div id="logoAndNav" class="container-fluid">
        <!-- Nav -->
        <nav class="js-mega-menu navbar navbar-expand-lg u-header__navbar">
          <!-- Logo -->
          <div class="u-header__navbar-brand-wrapper">
            <a class="navbar-brand u-header__navbar-brand" href="{{url('/wellcome')}}" aria-label="Space">
              <img class="u-header__navbar-brand-default" src="../../assets/space/svg/logos/logoo-white.svg" alt="Logo">
              <img class="u-header__navbar-brand-on-scroll" src="../../assets/space/svg/logos/logoo.svg" alt="Logo">
              <img class="u-header__navbar-brand-mobile" src="../../assets/space/svg/logos/logoo-short.svg" alt="Logo">
            </a>
          </div>
          <!-- End Logo -->

          <!-- Responsive Toggle Button -->
          <button type="button" class="navbar-toggler btn u-hamburger u-header__hamburger"
          aria-label="Toggle navigation"
          aria-expanded="false"
          aria-controls="navBar"
          data-toggle="collapse"
          data-target="#navBar">
          <span class="d-none d-sm-inline-block">Menu</span>
          <span id="hamburgerTrigger" class="u-hamburger__box ml-3">
            <span class="u-hamburger__inner"></span>
          </span>
        </button>
        <!-- End Responsive Toggle Button -->
        <!-- Navigation -->
        <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse py-0">
          <ul class="navbar-nav u-header__navbar-nav">
            <!-- Home -->
            <li class="nav-item hs-has-sub-menu u-header__nav-item"
            data-event="hover"
            data-animation-in="fadeInUp"
            data-animation-out="fadeOut">
            <a id="blogMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
            aria-haspopup="true"
            aria-expanded="false"
            aria-labelledby="blogSubMenu">
            Técnicas de aprendizaje
            <span class="fa fa-angle-down u-header__nav-link-icon"></span>
          </a>

          <!-- Blog - Submenu -->
          <ul id="blogSubMenu" class="list-inline hs-sub-menu u-header__sub-menu mb-0" style="min-width: 220px;"
          aria-labelledby="blogMegaMenu">
          <!-- Classic -->
          <li class="dropdown-item hs-has-sub-menu">
           <a class="nav-link u-header__sub-menu-nav-link" href="{{url('/memoria')}}">Técnicas de memoria</a>

           <!-- Submenu (level 2) -->
           
           <!-- End Submenu (level 2) -->
         </li>
         <!-- Classic -->

         <!-- Grid -->
         <li class="dropdown-item hs-has-sub-menu">
           <a class="nav-link u-header__sub-menu-nav-link" href="{{url('/concentracion')}}">Técnicas de concentración</a>

           <!-- Submenu (level 2) -->
           
           <!-- End Submenu (level 2) -->
         </li>
         <!-- Grid -->

         <!-- List -->
         <li class="dropdown-item hs-has-sub-menu">
           <a class="nav-link u-header__sub-menu-nav-link" href="{{url('/calculo')}}">Técnicas de cálculo mental</a>

           <!-- Submenu (level 2) -->
           
           <!-- End Submenu (level 2) -->
         </li>
         <!-- List -->

       </ul>
       <!-- End Submenu -->
     </li>  
     <li class="nav-item hs-has-sub-menu u-header__nav-item"
     data-event="hover"
     data-animation-in="fadeInUp"
     data-animation-out="fadeOut">
     <a id="blogMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
     aria-haspopup="true"
     aria-expanded="false"
     aria-labelledby="blogSubMenu">
     Documentos de aprendizaje
     <span class="fa fa-angle-down u-header__nav-link-icon"></span>
   </a>

   <!-- Blog - Submenu -->
   <ul id="blogSubMenu" class="list-inline hs-sub-menu u-header__sub-menu mb-0" style="min-width: 220px;"
   aria-labelledby="blogMegaMenu">
   <!-- Classic -->
   <li class="dropdown-item hs-has-sub-menu">
     <a class="nav-link u-header__sub-menu-nav-link" href="{{url('/informacionme')}}">Información de memoria</a>

     <!-- Submenu (level 2) -->
     
     <!-- End Submenu (level 2) -->
   </li>
   <!-- Classic -->

   <!-- Grid -->
   <li class="dropdown-item hs-has-sub-menu">
     <a class="nav-link u-header__sub-menu-nav-link" href="{{url('/informacioncon')}}">Información de concentración</a>

     <!-- Submenu (level 2) -->
     
     <!-- End Submenu (level 2) -->
   </li>
   <!-- Grid -->

   <!-- List -->
   <li class="dropdown-item hs-has-sub-menu">
     <a class="nav-link u-header__sub-menu-nav-link" href="{{url('/informacioncal')}}">Información de cálculo mental</a>

     <!-- Submenu (level 2) -->
     
     <!-- End Submenu (level 2) -->
   </li>
   <!-- List -->

 </ul>
 <!-- End Submenu -->
</li> 


<!-- Button -->
              <li class="nav-item u-header__nav-item-btn">
                <a class="btn btn-sm btn-primary" href="{{url('/login')}}" role="button"
                   data-modal-target="#signupModal"
                   data-overlay-color="#151b26">
                  <span class="fa fa-user-circle mr-1"></span>
                  Ingresar
                </a>
              </li>
              <!-- End Button -->

<!-- End Home -->
<!-- Blog -->

<!-- End Blog -->

<!-- Docs -->

<!-- End Docs -->

<!-- Button -->

<!-- End Button -->

<!-- Search -->
<li class="nav-item u-header__navbar-icon u-header__navbar-v-divider">
  

  <!-- Input -->
  <form id="search" class="js-focus-state input-group form u-header__search u-unfold--css-animation u-unfold--hidden">
    <input class="form-control form__input" type="search" placeholder="Search Space">
    <div class="input-group-addon u-header__search-addon p-0">
      <button class="btn btn-primary u-header__search-addon-btn" type="button">
        <span class="fa fa-search"></span>
      </button>
    </div>
  </form>
  <!-- End Input -->
</li>
<!-- End Search -->
</ul>
</div>
<!-- End Navigation -->

<ul class="navbar-nav flex-row u-header__secondary-nav">
  <!-- Shopping Cart -->
  <li class="nav-item u-header__navbar-icon-wrapper u-header__navbar-icon">
   

    <div id="shoppingCartDropdown" class="u-unfold u-unfold--cart text-center border rounded-0 right-0 p-7" aria-labelledby="shoppingCartDropdownInvoker" style="min-width: 250px;">
      <span class="u-icon u-icon--primary u-icon--md rounded-circle mb-3">
        <span class="fa fa-shopping-basket u-icon__inner"></span>
      </span>
      <span class="d-block">Your Cart is Empty</span>
    </div>
  </li>
  <!-- End Shopping Cart -->

  <!-- Account Signin -->
  <li class="nav-item u-header__navbar-icon">
    <!-- Account Sidebar Toggle Button -->
    <a id="sidebarNavToggler" class="btn btn-xs btn-icon btn-text-dark" href="javascript:;" role="button"
    aria-controls="sidebarContent"
    aria-haspopup="true"
    aria-expanded="false"
    data-unfold-event="click"
    data-unfold-hide-on-scroll="false"
    data-unfold-target="#sidebarContent"
    data-unfold-type="css-animation"
    data-unfold-animation-in="fadeInRight"
    data-unfold-animation-out="fadeOutRight"
    data-unfold-duration="500">
    <span class="fa fa-bars btn-icon__inner font-size-13"></span>
  </a>
  <!-- End Account Sidebar Toggle Button -->
</li>
<!-- End Account Signin -->
</ul>
</nav>
<!-- End Nav -->
</div>
</div>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
  <!-- Hero Section -->
  <div class="gradient-overlay-half-dark-v3 bg-img-hero" style="background-image: url(../../assets/space/img/1920x1080/img41.jpg);">
    <!-- Main Content -->
    <div class="d-lg-flex align-items-lg-center height-85vh--lg">
      <div class="container space-2 space-0--lg mt-lg-8">
        <div class="row justify-content-lg-between align-items-lg-center">
          <div class="col-lg-5 mb-7 mb-lg-0">
            <!-- Title -->
            <span class="d-block text-white  mb-1  contenido_principal" align="justify">El alumno puede estimular y entrenar su memoria, mejorar su capacidad de atención y retención. Este sistema evalúa al estudiante mediante juegos, muestra cuadros estadísticos de la mejoria en memoria, concentración y cálculo mental matemático. </span>
            <br>
            <h1 class="display-4 font-size-48--md-down text-white mb-0">Aprendizaje</h1>
            <!-- End Title -->
          </div>

          <div class="col-lg-5">
            <!-- Signup Form -->
            <div class="bg-white shadow-sm rounded p-6">
              <form class="js-validate">
                <div class="mb-4">
                  <h2 class="h4" align="center">Sistema de aprendizaje</h2>
                </div>

                <!-- Input -->
                <div class="js-form-message mb-3">
                  <div class="js-focus-state input-group input-group form">
                    <input type="text" class="form-control form__input" name="username" required
                    placeholder="Introduce tu nombre"
                    aria-label="Enter your username">
                  </div>
                </div>
                <!-- End Input -->

                <!-- Input -->
                <div class="js-form-message mb-3">
                  <div class="js-focus-state input-group input-group form">
                    <input type="email" class="form-control form__input" name="email" required
                    placeholder="Ingresa tu email"
                    aria-label="Enter your email address">
                  </div>
                </div>
                <!-- End Input -->

                <!-- Input -->
                <div class="js-form-message mb-3">
                  <div class="js-focus-state input-group input-group form">
                    <input type="password" class="form-control form__input" name="password" required
                    placeholder="Ingresa tu password"
                    aria-label="Enter your password">
                  </div>
                </div>
                <!-- End Input -->

                <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
              </form>
            </div>
            <!-- End Signup Form -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Main Content -->
  </div>

  <div class="d-lg-flex align-items-lg-center height-15vh--lg">
    <!-- Bottom Content -->
    <div class="container space-2 space-0--lg">
      <!-- Slick Carousel -->
      <div class="js-slick-carousel u-slick"
      data-autoplay="true"
      data-speed="5000"
      data-infinite="true"
      data-slides-show="6"
      data-responsive='[{
      "breakpoint": 1200,
      "settings": {
      "slidesToShow": 4
    }
  }, {
  "breakpoint": 992,
  "settings": {
  "slidesToShow": 4
}
}, {
"breakpoint": 768,
"settings": {
"slidesToShow": 3
}
}, {
"breakpoint": 576,
"settings": {
"slidesToShow": 3
}
}, {
"breakpoint": 480,
"settings": {
"slidesToShow": 2
}
}]'>
<div class="js-slide">
  <img class="u-clients" src= "../../assets/space/img/clients/fitbit.png" alt="Image Description">
</div>
<div class="js-slide">
  <img class="u-clients" src="../../assets/space/img/clients/embark.png" alt="Image Description">
</div>
<div class="js-slide">
  <img class="u-clients" src="../../assets/space/img/clients/uber.png" alt="Image Description">
</div>
<div class="js-slide">
  <img class="u-clients" src="../../assets/space/img/clients/stripe.png" alt="Image Description">
</div>
<div class="js-slide">
  <img class="u-clients" src="../../assets/space/img/clients/mapbox.png" alt="Image Description">
</div>
<div class="js-slide">
  <img class="u-clients" src="../../assets/space/img/clients/alphabet.png" alt="Image Description">
</div>
<div class="js-slide">
  <img class="u-clients" src="../../assets/space/img/clients/hubspot.png" alt="Image Description">
</div>
<div class="js-slide">
  <img class="u-clients" src="../../assets/space/img/clients/netflix.png" alt="Image Description">
</div>
</div>
<!-- End Slick Carousel -->
</div>
<!-- End Bottom Content -->
</div>
<!-- End Hero Section -->

<hr class="my-0">

<!-- Features Section -->
<div class="container space-2 space-3--lg">
  <div class="row justify-content-lg-between">
    <div class="col-md-4 col-lg-4 mb-7 mb-md-0">
      <div class="tab-vertical tab-vertical-md py-5 mr-lg-7">
        <div class="pr-md-7 mb-5">
          <h3 class="h4">Aprendizaje</h3>
        </div>

        <!-- Tab Nav -->
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active tab-vertical__nav-link" id="v-pills-features-tab" data-toggle="pill" href="#v-pills-features" role="tab" aria-controls="v-pills-features" aria-selected="true">
            1. Memoria
          </a>
          <a class="nav-link tab-vertical__nav-link" id="v-pills-key-benefits-tab" data-toggle="pill" href="#v-pills-key-benefits" role="tab" aria-controls="v-pills-key-benefits" aria-selected="false">
            2. Concentración
          </a>
          <a class="nav-link tab-vertical__nav-link" id="v-pills-company-tab" data-toggle="pill" href="#v-pills-company" role="tab" aria-controls="v-pills-company" aria-selected="false">
            3. Cáculo mental
          </a>
        </div>
        <!-- End Tab Nav -->
      </div>
    </div>

    <div class="col-md-8">
      <!-- Tab Content -->
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-features" role="tabpanel" aria-labelledby="v-pills-features-tab">
          <div class="row">
            <div class="col-sm-6 mb-7 mb-sm-9">
              <!-- Icon Block -->
              <div class="pr-lg-4">
                <img class="max-width-9 mb-2" src="../../assets/space/svg/components/idea-primary-icon.svg" alt="Image Description">
                <p align="justify">La memoria es la facultad de registrar la información de toda actividad mental, ideas, hechos pasados e imágenes captadas por el cerebro. Es procesada y almacenada que interactúa de manera constante. Retiene información a corto y largo plazo, para luego ser codificada por el cerebro. Tiene la capacidad de recordar la información del archivo mental mediante la memoria sensorial.  (Olcese, 2011)</p>
              </div>
              <!-- End Icon Block -->
            </div>                                   
          </div>
        </div>

        <div class="tab-pane fade" id="v-pills-key-benefits" role="tabpanel" aria-labelledby="v-pills-key-benefits-tab">
          <div class="row align-items-lg-center">
            <div class="col-lg-5 mb-7 mb-7 mb-lg-0">
              <img class="max-width-9 mb-2" src="../../assets/space/svg/components/arrow-red-icon.svg" alt="Image Description">
              <p align="justify">La concentración es un estímulo determinado por la capacidad de la mente, para controlar, dirigir, analizar el campo de la atención, desempeña los procesos de lectura, escritura, razonamiento, etc. La concentración se relaciona superficialmente en la atención, que permite captar otros elementos como conceptos o ideas previas con una información nueva, que se almacena en la memoria como se observa en la figura. (Flores, 2010)</p>
            </div>

          </div>
        </div>

        <div class="tab-pane fade" id="v-pills-company" role="tabpanel" aria-labelledby="v-pills-company-tab">
          <div class="row">
           <div class="col-sm-6 mb-7 mb-sm-9">
            <!-- Icon Block -->
            <div class="pr-lg-4">
              <img class="max-width-9 mb-2" src="../../assets/space/svg/components/puzzle-primary-icon.svg" alt="Image Description">
              <p align="justify">Según (Coto, 2012) el cálculo mental es desarrollar la destreza, realizar cálculos mentales, no sólo es de importancia para el aprendizaje de las matemáticas, sino para desarrollar aspectos tales como la memoria, concentración, atención, agilidad mental, etc., siendo uno de los mejores y más útiles ejercicios de gimnasia cerebral que puede haber sin alguna ayuda externa para el desarrollo de la mente</p>
              
            </div>
            <!-- End Icon Block -->
          </div>

        </div>
      </div>
    </div>
    <!-- End Tab Content -->
  </div>
</div>
</div>
<!-- End Features Section -->

<!-- Mockup Section -->
<div class="bg-gray-100">
  <div class="container space-2-top space-3-top--lg">
    <!-- Title -->
    <div class="w-md-80 w-lg-80 text-center mx-md-auto mb-9">
      <div class="mb-5">
        <h2 class="h1">Videos de técnicas de aprendizaje</h2>
        <p class="lead">Para la formación académica, el estudiante aprendera nuevas técnicas de memoria, concentración y cálculo mental matemático.</p>
      </div>

      <!-- Fancybox -->
      <a class="js-fancybox u-media-player" href="javascript:;"
      data-src="//vimeo.com/167434033"
      data-speed="700"
      data-animate-in="zoomIn"
      data-animate-out="zoomOut"
      data-caption="Space - Responsive Website Template">
      <span class="u-media-player__icon u-media-player__icon--xl u-media-player__icon--box-shadow">
        <span class="fa fa-play u-media-player__icon-inner"></span>
      </span>
    </a>
    <!-- End Fancybox -->
  </div>
  <!-- End Title -->

  <!-- SVG Mockup -->
  <div class="w-lg-50 mx-auto">
   <!--  <object type="image/svg+xml" data="svg/mockups/devices-1.svg"></object>-->
 </div>
 <br/>
 <!-- End SVG Mockup -->
</div>
</div>
<!-- End Mockup Section -->



<!-- Divider -->
<div class="w-50 w-lg-35 mx-auto">
  <hr class="my-0">
</div>
<!-- End Divider -->

<!-- Testimonials Section -->
<div class="container space-2 space-3--lg">
  <div class="row justify-content-lg-center">
    <div class="col-md-6 col-lg-5 mb-7 mb-md-0">
      <!-- Testimonials -->
      <div class="text-center px-lg-4">
        <div class="mb-2">
          <img class="u-avatar rounded-circle mx-auto mb-2" src="../../assets/space/img/100x100/img14.jpg" alt="Image Description">
          <h4 class="h6">Matemáticas</h4>
        </div>
        <blockquote class="text-secondary mb-0">
          Profesor.
          <br>
          Estudios realizados.
          <br>
          Descripción.
        </blockquote>
      </div>
      <!-- End Testimonials -->
    </div>

    <div class="col-md-6 col-lg-5">
      <!-- Testimonials -->
      <div class="text-center px-lg-4">
        <div class="mb-2">
          <img class="u-avatar rounded-circle mx-auto mb-2" src="../../assets/space/img/100x100/img4.jpg" alt="Image Description">
          <h4 class="h6">Cívica</h4>
        </div>
        <blockquote class="text-secondary mb-0">
          Profesor.
          <br>
          Estudios realizados.
          <br>
          Descripción.
        </blockquote>
      </div>
      <!-- End Testimonials -->
    </div>

    <div class="col-md-6 col-lg-5">
      <!-- Testimonials -->
      <div class="text-center px-lg-4">
        <div class="mb-2">
          <img class="u-avatar rounded-circle mx-auto mb-2" src="../../assets/space/img/100x100/img2.jpg" alt="Image Description">
          <h4 class="h6">Literatura</h4>
        </div>
        <blockquote class="text-secondary mb-0">
          Profesor.
          <br>
          Estudios realizados.
          <br>
          Descripción.
        </blockquote>
      </div>
      <!-- End Testimonials -->
    </div>
  </div>
</div>
<!-- End Testimonials Section -->

<!-- CTA - Revisar este contenido de sistema-->
    <!--<div class="gradient-overlay-half-primary-v1">
      <div class="bg-img-hero" style="background-image: url(img/bg/bg2.png);">
        <div class="container">
          <div class="row align-items-lg-center text-center text-lg-left space-2">
            <div class="col-lg-7">
              <h2 class="text-white">Sistema de aprendizaje</h2>
            </div>

            <div class="col-lg-5 text-lg-right">
              <a class="btn btn-light mb-2 mb-sm-0" href="../../starter/index.html">Leer mas</a>
            </div>
          </div>
        </div>
      </div>
    </div>-->
    <!-- End CTA -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
  <footer class="bg-dark pt-1">
    <div class="container space-1">
      <div class="row justify-content-md-between">
        <div class="col-6 col-md-6 col-lg-6 order-lg-1 mb-5 mb-lg-0">
          <h3 class="font-weight-medium gam">APRENDIZAJE</h3>
          <p class="">Ubicación del colegio</p>
          <p>Calle Ricardo de Jaime Freyre - Colegio San Martin de Porres "Don Bosco"
          </p>
        </div>
        <div class="col-6 col-md-3 col-lg-3 order-lg-1 mb-5 mb-lg-0">
          <h3 class="h6 text-white mb-3">Contactos</h3>

          <!-- List -->
          <div class="list-group list-group-flush list-group-transparent">

            <a class="list-group-item list-group-item-action" href="#">
              <span class="fab min-width-3 text-center mr-2"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfkAR4LEzZup8HCAAABFklEQVQ4y42RP0oDQRjFvxVZq10kJxBFUNwDWFh6AVnWc+g5FnSJ5Aqp9AbaWdgbIRgIalqxCCmMJPnZTCZO5pt1XzPMe+/H/PlE1kRGRY8JE3pUZFInYjrM+asZN8Th+gOa7gMIHUJqa/WMmYk/yElIOKNvL3bkA5Wtt6zXYmTcKx94MVHuuIVxn31gbKLEcVPjjpfOhs3m6k9E6+kKeDfrqQMsd2/+lUpzeN959KtxSx84YGHCEQUpKbmtLzjUJtENDq6rT3qHb7U+ZU902Xe4KiUktvn06l+rT9CQSw+4kDoRM3DqQ7akXpw7QCH/i0dbfyJqAhzbEZ40qIuIcAfAbcO6CLtM+WFfyzY1MxpyLRINtOwXs8CbbeVpyHQAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjAtMDEtMzBUMTE6MTk6NTQrMDA6MDBJSVugAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIwLTAxLTMwVDExOjE5OjU0KzAwOjAwOBTjHAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAASUVORK5CYII="></span>
                Plaza Principal 16 de Julio
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <span class="fab  min-width-3 text-center mr-2"><img
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAMAAADXqc3KAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAz1BMVEUAAAD//////v7//v7//f3//////v7//////v7//////v7//f3//v7//v7//f3//v7//////v7//////v7//////f3//////////v7//////v7//v7//////////v7//////////////v7//////////v7//v7//v7//////////////////f3//////////////f3//v7//v7//////v7//////v7//////f3//v7//v7//////////f3//v7//v7//v7//v7//////v4AAABX3yHFAAAAQ3RSTlMAUuj0hyn5Texh1oaww4PxQ9IJ+zyieEC8AsXhC0n8TB0w/ko+0+3CX0sodYgKAXmE3/McrkfHP6Dy5gdBga3U6/hQhMvyLwAAAAFiS0dEAIgFHUgAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfkAR4LEi392TlvAAAAtUlEQVQoz3XQ1xKCMBAF0FVQsIGKBRsodrF3scv//5MkszjjEu5Tcs8kmQ0kkn4QSQYa3gdJUUgjKBRUhAyFLEKOQh6hQEFD0CkUEUoUyhLvjUpkkCqHWqSHOuvNRhSgGUCrLYAOOyILgI9i2QLosm/RewJRHCZ9thwMR2NtMp2huOwZa75Yrgycd40i893G9MNsw9tcx//P7x1bjQHY7WMA4HCMAYDT+YK9R0e63u6P5+vtfb4zyjXnbqW9DwAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMC0wMS0zMFQxMToxODo0NSswMDowMMxWO7QAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjAtMDEtMzBUMTE6MTg6NDUrMDA6MDC9C4MIAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==">
                </span>
                282-1670 / 282-2061
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <span class="fab min-width-3 text-center mr-2"><img
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfkAR4LDyUMbt1BAAAAs0lEQVQ4y82SOw6CQABER06gCQQSLmNnoQWJXo4TYLbRQguNhYfRwp6EjmeBa+QTWBria3feTDa70v9BxJkCFwpOhMI4hS17sSB1jhsCkUhseA6GX+wkEgEGf3DHEDAnBX3sbc9O1b3mAVagZ+fbXaFaU3On1t0W7I5PRklJhv/b3S3YnZi42V0xg47nv+siaaVl+6hb6MEb+/emEIpR+cLTbZRwFRFHcqfPnXMgHHuFCXgDkhDjVYOdSFMAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjAtMDEtMzBUMTE6MTU6MzcrMDA6MDCk8qg0AAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIwLTAxLTMwVDExOjE1OjM3KzAwOjAw1a8QiAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAASUVORK5CYII="></span>
                  info@elcolegio.gob.bo
                </a>
              </div>
              <!-- End List -->
            </div>
            <div class="col-6 col-md-3 col-lg-3 order-lg-1 mb-5 mb-lg-0">
              <h3 class="h6 text-white mb-3">Redes sociales</h3>

              <a href="#">
                <span class="fab fa-facebook-f min-width-3 text-center mr-2"></span>

              </a>
              <a href="#">
                <span class="fab fa-twitter min-width-3 text-center mr-2"></span>
              </a>
              
              <a href="#">
                <span class="fab fa-github min-width-3 text-center mr-2"></span>

              </a>
              
            </div>

          </div>
        </div>
        <div class="pie">

          <div class="pie_derechos">
            <label class="small text-muted">Todos los derechos reservados. &copy; 2022</label>
          </div>
          <div class="pie_redes">
            <a href="#">
              <span class="fab min-width-3 text-center mr-2"><img src="../../assets/space/svg/logos/logoo-white.svg"></span>
            </a>
          </div>
          <div class="pie_privaci">
            <label class="small text-muted">Política de privacidad</label>
          </div>

        </div>
      </footer>
      <!-- ========== END FOOTER ========== -->

      <!-- ========== SECONDARY CONTENTS ========== -->

  </form>
</div>
<!-- End Content -->
</div>
<!-- End Signup Modal Window -->
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- Go to Top -->
<a class="js-go-to u-go-to" href="javascript:;"
data-position='{"bottom": 15, "right": 15 }'
data-type="fixed"
data-offset-top="400"
data-compensation="#header"
data-show-effect="slideInUp"
data-hide-effect="slideOutDown">
<span class="fa fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->

<!-- JS Global Compulsory -->
<script src="../../assets/space/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../assets/space/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="../../assets/space/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="../../assets/space/vendor/bootstrap/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="../../assets/space/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="../../assets/space/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="../../assets/space/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../../assets/space/vendor/custombox/dist/custombox.min.js"></script>
<script src="../../assets/space/vendor/custombox/dist/custombox.legacy.min.js"></script>
<script src="../../assets/space/vendor/slick-carousel/slick/slick.js"></script>
<script src="../../assets/space/vendor/fancybox/jquery.fancybox.min.js"></script>

<!-- JS Space -->
<script src="../../assets/space/js/hs.core.js"></script>
<script src="../../assets/space/js/components/hs.header.js"></script>
<script src="../../assets/space/js/components/hs.unfold.js"></script>
<script src="../../assets/space/js/components/hs.validation.js"></script>
<script src="../../assets/space/js/helpers/hs.focus-state.js"></script>
<script src="../../assets/space/js/components/hs.malihu-scrollbar.js"></script>
<script src="../../assets/space/js/components/hs.modal-window.js"></script>
<script src="../../assets/space/js/components/hs.show-animation.js"></script>
<script src="../../assets/space/js/components/hs.slick-carousel.js"></script>
<script src="../../assets/space/js/components/hs.fancybox.js"></script>
<script src="../../assets/space/js/components/hs.go-to.js"></script>

<!-- JS Plugins Init. -->
<script>
  $(window).on('load', function () {
      // initialization of HSMegaMenu component
      $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991,
        hideTimeOut: 0
      });
    });

  $(document).on('ready', function () {
      // initialization of header
      $.HSCore.components.HSHeader.init($('#header'));

      // initialization of unfold component
      $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
        afterOpen: function () {
          if (!$('body').hasClass('IE11')) {
            $(this).find('input[type="search"]').focus();
          }
        }
      });

      // initialization of form validation
      $.HSCore.components.HSValidation.init('.js-validate', {
        rules: {
          confirmPassword: {
            equalTo: '#password'
          }
        }
      });

      // initialization of forms
      $.HSCore.helpers.HSFocusState.init();

      // initialization of malihu scrollbar
      $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

      // initialization of autonomous popups
      $.HSCore.components.HSModalWindow.init('[data-modal-target]', '.js-signup-modal', {
        autonomous: true
      });

      // initialization of show animations
      $.HSCore.components.HSShowAnimation.init('.js-animation-link');

      // initialization of slick carousel
      $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

      // initialization of fancybox
      $.HSCore.components.HSFancyBox.init('.js-fancybox');

      // initialization of go to
      $.HSCore.components.HSGoTo.init('.js-go-to');
    });
  </script>
</body>
</html>