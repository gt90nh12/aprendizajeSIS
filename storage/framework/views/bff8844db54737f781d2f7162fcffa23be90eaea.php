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
 <header id="header" class="u-header u-header--modern u-header--bordered u-header--bg-transparent  u-header--sticky-top-lg">
    <div class="u-header__section">
      <div id="logoAndNav" class="container-fluid">
        <!-- Nav -->
        <nav class="js-mega-menu navbar navbar-expand-lg u-header__navbar">
          <!-- Logo -->
          <div class="u-header__navbar-brand-wrapper">
            <a class="navbar-brand u-header__navbar-brand" href="<?php echo e(url('/inicio'), false); ?>" aria-label="Space">
              <img class="u-header__navbar-brand-default" src="../../assets/space/svg/logos/logoo.svg" alt="Logo">
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
           <a class="nav-link u-header__sub-menu-nav-link" href="<?php echo e(url('/memoria'), false); ?>">Técnicas de memoria</a>

           <!-- Submenu (level 2) -->
           
           <!-- End Submenu (level 2) -->
         </li>
         <!-- Classic -->

         <!-- Grid -->
         <li class="dropdown-item hs-has-sub-menu">
           <a class="nav-link u-header__sub-menu-nav-link" href="<?php echo e(url('/concentracion'), false); ?>">Técnicas de concentración</a>

           <!-- Submenu (level 2) -->
           
           <!-- End Submenu (level 2) -->
         </li>
         <!-- Grid -->

         <!-- List -->
         <li class="dropdown-item hs-has-sub-menu">
           <a class="nav-link u-header__sub-menu-nav-link" href="<?php echo e(url('/calculo'), false); ?>">Técnicas de cálculo mental</a>

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
     <a class="nav-link u-header__sub-menu-nav-link" href="<?php echo e(url('/informacionme'), false); ?>">Información de memoria</a>

     <!-- Submenu (level 2) -->
     
     <!-- End Submenu (level 2) -->
   </li>
   <!-- Classic -->

   <!-- Grid -->
   <li class="dropdown-item hs-has-sub-menu">
     <a class="nav-link u-header__sub-menu-nav-link" href="<?php echo e(url('/informacioncon'), false); ?>">Información de concentración</a>

     <!-- Submenu (level 2) -->
     
     <!-- End Submenu (level 2) -->
   </li>
   <!-- Grid -->

   <!-- List -->
   <li class="dropdown-item hs-has-sub-menu">
     <a class="nav-link u-header__sub-menu-nav-link" href="<?php echo e(url('/informacioncal'), false); ?>">Información de cálculo mental</a>

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
<a id="blogMegaMenu" class="nav-link u-header__nav-link" href="<?php echo e(url('/inicio'), false); ?>"
aria-haspopup="true"
aria-expanded="false"
aria-labelledby="blogSubMenu">
Pagina principal
</a>

<!-- End Submenu -->
</li> 
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

<br>
<br>
  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="bg-img-hero" style="background-image: url(img/bg/bg1.png);">
      <div class="js-slick-carousel u-slick space-2"
           data-infinite="true"
           data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-classic--dark u-slick__arrow-centered--y rounded-circle"
           data-arrow-left-classes="fa fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
           data-arrow-right-classes="fa fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
           data-pagi-classes="text-center u-slick__pagination mt-7 mb-0">
        <div class="js-slide">
          <!-- Product Item -->
          <div class="container">
            <div class="row justify-content-lg-center align-items-lg-center">
              <div class="col-lg-5">
                <div class="pr-lg-4">
                  <!-- Title -->
                  <div class="mb-5">
                    <h1 align="center">Máxima memoria - Cómo mejorar tu memoria en una tarde</h1>
                    <p align ="justify">¡Conviértete en una "computadora viviente" de un día para otro!
                        Sólo te llevará una tarde el método para memorizar cualquier grupo de datos (por grande que sea). (Valois, 2018)</p>
                  </div>
                  <!-- End Title -->
                </div>

                </div>

              <div class="col-lg-6">
                <img class="img-fluid" src="../../assets/space/img/mockups/libro 4.png" alt="Image Description">
              </div>
            </div>
          </div>
          <!-- End Product Item -->
        </div>

        <div class="js-slide">
          <!-- Product Item -->
          <div class="container">
            <div class="row justify-content-lg-center align-items-lg-center">
              <div class="col-lg-5">
                <div class="pr-lg-4">
                  <!-- Title -->
                  <div class="mb-5">
                    <h1 align="center">Como entrenar tú cerebro - más rapido y más agil</h1>
                    <p align ="justify">La neuroplasticidad es la capacidad de armar nuevas redes neuronales, y se pone en funcionamiento ante nuevos estimulos, sean esto un aprendizaje, un cambio 
                      de ambiente o una estimulacion sensorial. (López, 2016) </p>
                  </div>
                  <!-- End Title -->
                </div>
               
              </div>

              <div class="col-lg-6">
                <img class="img-fluid" src="../../assets/space/img/mockups/libro 2.png" alt="Image Description">
              </div>
            </div>
          </div>
          <!-- End Product Item -->
        </div>
        <div class="js-slide">
          <!-- Product Item -->
          <div class="container">
            <div class="row justify-content-lg-center align-items-lg-center">
              <div class="col-lg-5">
                <div class="pr-lg-4">
                  <!-- Title -->
                  <div class="mb-5">
                    <h1 align="center">Consigue una memoria asombrosa - técnicas y consejos que cambiarán tu vida</h1>
                    <p align="justify">En este libro explica cómo descubrió y desarrolló su propio método, para mejor la memoria y obtener resultados insospechados. (O' Brien, 2015)
                    </p>
                  </div>
                  <!-- End Title -->
                </div>

                </div>

              <div class="col-lg-6">
                <img class="img-fluid" src="../../assets/space/img/mockups/libro 3.png" alt="Image Description">
              </div>
            </div>
          </div>
          <!-- End Product Item -->
        </div>
        <div class="js-slide">
          <!-- Product Item -->
          <div class="container">
            <div class="row justify-content-lg-center align-items-lg-center">
              <div class="col-lg-5">
                <div class="pr-lg-4">
                  <!-- Title -->
                  <div class="mb-5">
                    <h1 align="center">Técnicas para mejorar la memoria - estretagias para luchar contra el olvido</h1>
                    <p align="justify">Las técnicas, para mejora la memoria, se explica como funciona la memoria y cuáles son los mecanismos, por cuales olvidamos unas cosas o recodarmos perfectamente otras. (Paz, 2005)
                    </p>
                  </div>
                  <!-- End Title -->
                </div>

                </div>

              <div class="col-lg-6">
                <img class="img-fluid" src="../../assets/space/img/mockups/libro 5.png" alt="Image Description">
              </div>
            </div>
          </div>
          <!-- End Product Item -->
        </div>
        
        <!-- End Slick Carousel -->
      </div>
    </div>
    <!-- End Hero Section -->
   
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
    <footer class="bg-dark pt-1">
  <div class="container space-1">
    <div class="row justify-content-md-between">
      <div class="col-6 col-md-6 col-lg-6 order-lg-1 mb-5 mb-lg-0">
        <h3 class="font-weight-medium gam">APRENDIZAJE</h3>
        <p class="">Ubicación del colegio</p>
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
      <label class="small text-muted">Todos los derechos reservados. &copy; 2020</label>
    </div>
    <div class="pie_redes">
      <a href="#">
        <span class="fab min-width-3 text-center mr-2"><img src="svg/logos/logoo-white.svg"></span>
      </a>
    </div>
    <div class="pie_privaci">
      <label class="small text-muted">Política de privacidad</label>
    </div>

  </div>
</footer>
  <!-- ========== END FOOTER ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->
  <!-- Panel Sidebar Navigation -->
  <aside id="sidebarContent" class="u-sidebar u-unfold--css-animation u-unfold--hidden" aria-labelledby="sidebarNavToggler">
    <div class="u-sidebar__scroller">
      <div class="u-sidebar__container">
        <div class="u-sidebar--panel__footer-offset">
          <!-- Toggle Button -->
          <div class="d-flex align-items-center border-bottom py-4 px-5">
            <h4 class="h5 mb-0">Account</h4>

            <button type="button" class="close u-sidebar__close ml-auto"
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
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- End Toggle Button -->

          <!-- Content -->
          <div class="js-scrollbar u-sidebar__body">
            <div class="u-sidebar__content py-5">
              <!-- Title -->
              <div class="py-2 px-5">
                <h4 class="text-uppercase text-muted font-size-13 mb-0">Menu label</h4>
              </div>
              <!-- End Title -->

              <!-- List -->
              <ul class="list-unstyled font-size-14 mb-5">
                <li>
                  <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                    <img class="max-width-4 mr-3" src="../../assets/space/svg/components/finance-dark-icon.svg" alt="Image Description">
                    <div class="media-body">
                      <span>Dashboard</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                    <img class="max-width-4 mr-3" src="../../assets/space/svg/components/touch-dark-icon.svg" alt="Image Description">
                    <div class="media-body">
                      <span>Activity</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                    <img class="max-width-4 mr-3" src="../../assets/space/svg/components/team-dark-icon.svg" alt="Image Description">
                    <div class="media-body">
                      <span>Team</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                    <img class="max-width-4 mr-3" src="../../assets/space/svg/components/email-dark-icon.svg" alt="Image Description">
                    <div class="media-body">
                      <span>Mailbox</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                    <img class="max-width-4 mr-3" src="../../assets/space/svg/components/projects-dark-icon.svg" alt="Image Description">
                    <div class="media-body">
                      <span>Projects</span>
                    </div>
                  </a>
                </li>
              </ul>
              <!-- End List -->

              <!-- Title -->
              <div class="py-2 px-5">
                <h4 class="text-uppercase text-muted font-size-13 mb-0">Sub level</h4>
              </div>
              <!-- End Title -->

              <!-- List -->
              <ul class="list-unstyled font-size-14 mb-0">
                <li>
                  <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                    <img class="max-width-4 mr-3" src="../../assets/space/svg/components/calendar-dark-icon.svg" alt="Image Description">
                    <div class="media-body">
                      <span>Calendar</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                    <img class="max-width-4 mr-3" src="../../assets/space/svg/components/cog-dark-icon.svg" alt="Image Description">
                    <div class="media-body">
                      <span>Tools</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="media align-items-center u-sidebar--panel__link py-2 px-5" href="#">
                    <img class="max-width-4 mr-3" src="../../assets/space/svg/components/archive-dark-icon.svg" alt="Image Description">
                    <div class="media-body">
                      <span>Archive</span>
                    </div>
                  </a>
                </li>
              </ul>
              <!-- End List -->
            </div>
          </div>
          <!-- End Content -->
        </div>

        <!-- Footer -->
        <footer class="u-sidebar__footer u-sidebar__footer--panel py-4 px-5">
          <!-- List -->
          <ul class="list-inline font-size-14 mb-0">
            <li class="list-inline-item">
              <a class="u-sidebar--panel__link pr-2" href="../pages/privacy.html">Privacy</a>
            </li>
            <li class="list-inline-item">
              <a class="u-sidebar--panel__link px-2" href="../pages/terms.html">Terms</a>
            </li>
            <li class="list-inline-item">
              <a class="u-sidebar--panel__link pl-2" href="../pages/help.html">
                <i class="fa fa-info-circle"></i>
              </a>
            </li>
          </ul>
          <!-- End List -->
        </footer>
        <!-- End Footer -->
      </div>
    </div>
  </aside>
  <!-- End Panel Sidebar Navigation -->

  <!-- Signup Modal Window -->
  <div id="signupModal" class="js-signup-modal u-modal-window" style="width: 500px;">
    <!-- Modal Close Button -->
    <button class="btn btn-sm btn-icon btn-text-secondary u-modal-window__close" type="button" onclick="Custombox.modal.close();">
      <span class="fas fa-times"></span>
    </button>
    <!-- End Modal Close Button -->

    <!-- Content -->
    <div class="p-5">
      <form class="js-validate">
        <!-- Signin -->
        <div id="signin" data-target-group="idForm">
          <!-- Title -->
          <header class="text-center mb-5">
            <h2 class="h4 mb-0">Please sign in</h2>
            <p>Signin to manage your account.</p>
          </header>
          <!-- End Title -->

          <!-- Input -->
          <div class="js-form-message mb-3">
            <div class="js-focus-state input-group form">
              <div class="input-group-prepend form__prepend">
                <span class="input-group-text form__text">
                  <span class="fa fa-user form__text-inner"></span>
                </span>
              </div>
              <input type="email" class="form-control form__input" name="email" required
                     placeholder="Email"
                     aria-label="Email"
                     data-msg="Please enter a valid email address."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class="js-form-message mb-3">
            <div class="js-focus-state input-group form">
              <div class="input-group-prepend form__prepend">
                <span class="input-group-text form__text">
                  <span class="fa fa-lock form__text-inner"></span>
                </span>
              </div>
              <input type="password" class="form-control form__input" name="password" required
                     placeholder="Password"
                     aria-label="Password"
                     data-msg="Your password is invalid. Please try again."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <div class="row mb-3">
            <div class="col-6">
              <!-- Checkbox -->
              <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                <input type="checkbox" class="custom-control-input" id="rememberMeCheckbox">
                <label class="custom-control-label" for="rememberMeCheckbox">
                  Remember Me
                </label>
              </div>
              <!-- End Checkbox -->
            </div>

            <div class="col-6 text-right">
              <a class="js-animation-link float-right" href="javascript:;"
                 data-target="#forgotPassword"
                 data-link-group="idForm"
                 data-animation-in="fadeIn">Forgot Password?</a>
            </div>
          </div>

          <div class="mb-3">
            <button type="submit" class="btn btn-block btn-primary">Signin</button>
          </div>

          <div class="text-center mb-3">
            <p class="text-muted">
              Do not have an account?
              <a class="js-animation-link" href="javascript:;"
                 data-target="#signup"
                 data-link-group="idForm"
                 data-animation-in="fadeIn">Signup
              </a>
            </p>
          </div>

          <!-- Divider -->
          <div class="text-center u-divider-wrapper my-3">
            <span class="u-divider u-divider--xs u-divider--text">OR</span>
          </div>
          <!-- End Divider -->

          <!-- Signin Social Buttons -->
          <div class="row mx-gutters-2 mb-4">
            <div class="col-sm-6 mb-2 mb-sm-0">
              <button type="button" class="btn btn-block btn-facebook text-nowrap">
                <span class="fab fa-facebook-f mr-2"></span>
                Signin with Facebook
              </button>
            </div>
            <div class="col-sm-6">
              <button type="button" class="btn btn-block btn-twitter">
                <span class="fab fa-twitter mr-2"></span>
                Signin with Twitter
              </button>
            </div>
          </div>
          <!-- End Signin Social Buttons -->
        </div>
        <!-- End Signin -->

        <!-- Signup -->
        <div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">
          <!-- Title -->
          <header class="text-center mb-5">
            <h2 class="h4 mb-0">Please sign up</h2>
            <p>Fill out the form to get started.</p>
          </header>
          <!-- End Title -->

          <!-- Input -->
          <div class="js-form-message mb-3">
            <div class="js-focus-state input-group form">
              <div class="input-group-prepend form__prepend">
                <span class="input-group-text form__text">
                  <span class="fa fa-user form__text-inner"></span>
                </span>
              </div>
              <input type="email" class="form-control form__input" name="email" required
                     placeholder="Email"
                     aria-label="Email"
                     data-msg="Please enter a valid email address."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class="js-form-message mb-3">
            <div class="js-focus-state input-group form">
              <div class="input-group-prepend form__prepend">
                <span class="input-group-text form__text">
                  <span class="fa fa-lock form__text-inner"></span>
                </span>
              </div>
              <input type="password" class="form-control form__input" name="password" id="password" required
                     placeholder="Password"
                     aria-label="Password"
                     data-msg="Your password is invalid. Please try again."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class="js-form-message mb-3">
            <div class="js-focus-state input-group form">
              <div class="input-group-prepend form__prepend">
                <span class="input-group-text form__text">
                  <span class="fa fa-key form__text-inner"></span>
                </span>
              </div>
              <input type="password" class="form-control form__input" name="confirmPassword" required
                     placeholder="Confirm Password"
                     aria-label="Confirm Password"
                     data-msg="Password does not match the confirm password."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <div class="mb-3">
            <button type="submit" class="btn btn-block btn-primary">Signup</button>
          </div>

          <div class="text-center mb-3">
            <p class="text-muted">
              Have an account?
              <a class="js-animation-link" href="javascript:;"
                 data-target="#signin"
                 data-link-group="idForm"
                 data-animation-in="fadeIn">Signin
              </a>
            </p>
          </div>

          <!-- Divider -->
          <div class="text-center u-divider-wrapper my-3">
            <span class="u-divider u-divider--xs u-divider--text">OR</span>
          </div>
          <!-- End Divider -->

          <!-- Signup Social Buttons -->
          <div class="row mx-gutters-2 mb-4">
            <div class="col-sm-6 mb-2 mb-sm-0">
              <button type="button" class="btn btn-block btn-facebook text-nowrap">
                <span class="fab fa-facebook-f mr-2"></span>
                Signup with Facebook
              </button>
            </div>
            <div class="col-sm-6">
              <button type="button" class="btn btn-block btn-twitter">
                <span class="fab fa-twitter mr-2"></span>
                Signup with Twitter
              </button>
            </div>
          </div>
          <!-- End Signup Social Buttons -->
        </div>
        <!-- End Signup -->

        <!-- Forgot Password -->
        <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">
          <!-- Title -->
          <header class="text-center mb-5">
            <h2 class="h4 mb-0">Recover account</h2>
            <p>Enter your email address and an email with instructions will be sent to you.</p>
          </header>
          <!-- End Title -->

          <!-- Input -->
          <div class="js-form-message mb-3">
            <div class="js-focus-state input-group form">
              <div class="input-group-prepend form__prepend">
                <span class="input-group-text form__text">
                  <span class="fa fa-user form__text-inner"></span>
                </span>
              </div>
              <input type="email" class="form-control form__input" name="email" required
                     placeholder="Email"
                     aria-label="Email"
                     data-msg="Please enter a valid email address."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <div class="mb-3">
            <button type="submit" class="btn btn-block btn-primary">Recover Account</button>
          </div>

          <div class="text-center mb-3">
            <p class="text-muted">
              Have an account?
              <a class="js-animation-link" href="javascript:;"
                 data-target="#signin"
                 data-link-group="idForm"
                 data-animation-in="fadeIn">Signin
              </a>
            </p>
          </div>
        </div>
        <!-- End Forgot Password -->
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

      // initialization of go to
      $.HSCore.components.HSGoTo.init('.js-go-to');
    });
  </script>
</body>
</html><?php /**PATH C:\laragon\www\aprendizaje\resources\views/tecnicasinformacion/informacionme.blade.php ENDPATH**/ ?>