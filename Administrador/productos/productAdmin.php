<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Second Life</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="../../site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.css">
    <link rel="stylesheet" href="../../assets/css/flaticon.css">
    <link rel="stylesheet" href="../../assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="../../assets/css/lightslider.min.css">
    <link rel="stylesheet" href="../../assets/css/price_rangs.css">
    <link rel="stylesheet" href="../../assets/css/gijgo.css">
    <link rel="stylesheet" href="../../assets/css/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/animated-headline.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/slick.css">
    <link rel="stylesheet" href="../../assets/css/nice-select.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="../../assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start-->
    <header>
       <!-- Header Start -->
       <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row menu-wrapper align-items-center justify-content-between">
                    <div class="header-left d-flex align-items-center">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="../../index.html"><img src="../../assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!-- Logo-2 -->
                        <div class="logo2">
                            <a href="../../index.html"><img src="../../assets/img/logo/logo2.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->

                        <?php include '../menuAdministrador.html'; ?>
                          
                    </div>
                    <div class="header-right1 d-flex align-items-center">
                        <div class="search">
                            <ul class="d-flex align-items-center">
                                <li>
                                    <a href="#" class="account-btn" target="">Juan Fernando Peréz Del Corral
                                    <a href="../assets/php/cerrarSesion.php" class="account-btn" target="">Cerrar Sesión </a>
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    </header>
    <main>
        <!--? slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-8 col-md-8">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Productos</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="../../index.html">Inicio</a></li>
                                            <li class="breadcrumb-item"><a href="#">Productos</a></li> 
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!--================Cart Area =================-->
        <section class="cart_area section-padding40">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <h1 scope="col">Producto</h1>
                                  </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="../../assets/img/gallery/card1.png" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p>Descripcion Producto</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn" href="producEditar.html">Editar</a>
                                    </td>
                                    <td>
                                        <a class="btn" href="#">Eliminar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="../../assets/img/gallery/card2.png" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p>Descripcion Producto</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                            <a class="btn" href="producEditar.html">Editar</a>
                                    </button>
                                 </td>
                                    <td>
                                        <a class="btn" href="#">Eliminar</a>
                                    </td>
                                </tr>
                                <tr class="bottom_button">
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="cupon_text float-right">
                                            <a class="btn" href="producAgregar.html">Agregar Producto</a>
                                        </div>
                                    </td>
                                </tr>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Cart Area =================-->
      
    </main>
    <footer>
    <?php include '../../footer.html'; ?>
      </footer>
      <!-- Scroll Up -->
      <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <!-- Jquery, Popper, Bootstrap -->
    <script src="../../assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- Slick-slider , Owl-Carousel ,slick-nav -->
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <script src="../../assets/js/slick.min.js"></script>
    <script src="../../assets/js/jquery.slicknav.min.js"></script>

    <!-- One Page, Animated-HeadLin, Date Picker -->
    <script src="../../assets/js/wow.min.js"></script>
    <script src="../../assets/js/animated.headline.js"></script>
    <script src="../../assets/js/jquery.magnific-popup.js"></script>
    <script src="../../assets/js/gijgo.min.js"></script>

    <!-- Nice-select, sticky,Progress -->
    <script src="../../assets/js/jquery.nice-select.min.js"></script>
    <script src="../../assets/js/jquery.sticky.js"></script>
    <script src="../assets/js/jquery.barfiller.js"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="../../assets/js/jquery.counterup.min.js"></script>
    <script src="../../assets/js/waypoints.min.js"></script>
    <script src="../../assets/js/jquery.countdown.min.js"></script>
    <script src="../../assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="../../assets/js/contact.js"></script>
    <script src="../../assets/js/jquery.form.js"></script>
    <script src="../../assets/js/jquery.validate.min.js"></script>
    <script src="../../assets/js/mail-script.js"></script>
    <script src="../../assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/main.js"></script>
    
</body>
</html>