
<!DOCTYPE html>
<html lang=" ">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AAE-@yield('title')</title>
    @yield('css')
    <link href="images/favicon.ico" rel="icon">
    <link rel="stylesheet" href="{{ asset("../assets/vendor/css/bundle.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("../assets/vendor/css/owl.carousel.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("../assets/vendor/css/jquery.fancybox.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("../assets/vendor/css/cubeportfolio.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("../assets/vendor/css/tooltipster.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("../assets/vendor/css/revolution-settings.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("../assets/construction/css/revolution/navigation.css") }}" />
    <link rel="stylesheet" href="{{ asset("../assets/construction/css/style.css") }}" />

</head>
<body onload=showDate();>

<!--PreLoader Ends-->
<!-- header -->
<header class="site-header">
    <nav class="navbar navbar-expand-lg static-nav bg-yellow">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="../assets/construction/images/afwa-logo.jfif" alt="logo-afwa" alt="logo" style="width:50px;height:auto;">
            </a>
            <div class="collapse navbar-collapse">
 @auth
        <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="/home" type="submit" class="btn button btn-blue btn-block w-100 ">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" type="submit" class="btn button btn-blue btn-block w-100 ">Offres en ligne</a>
                    </li>
                    <li class="nav-item">
                        <a href="/gestion_des_offres" type="submit" class="btn button btn-blue btn-block w-100 ">
                        Gestion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{Route('logout')}}" type="submit" class="btn button btn-blue btn-block w-100 ">Se déconnecter</a>
                    </li>
                </ul>
    

@endauth
                <ul class="navbar-nav text-center font-weight-bold">
                    <center><h3><strong>@yield('entete')</strong></h3></center>
                </ul>
@yield('menu')
            </div>
            <ul class="social-icons darkcolor social-icons-simple d-lg-inline-block d-none animated fadeInUp" data-wow-delay="300ms">
                <li><a href="#." class="facebook"><i class="fab fa-facebook-f"></i> </a> </li>
                <li><a href="#." class="twitter"><i class="fab fa-twitter"></i> </a> </li>
                <li><a href="#." class="linkedin"><i class="fab fa-linkedin-in"></i> </a> </li>
            </ul>
        </div>
        <!--side menu open button-->
        <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
            <span class="bg-dark"></span> <span class="bg-dark"></span> <span class="bg-dark"></span>
        </a>
    </nav>
    <!-- side menu -->
    <div class="side-menu opacity-0 ">
        <div class="overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">

                    <li class="nav-item">
                         <a class="nav-link" href="/"><strong></strong></a>
                    </li>
                </ul>
            </nav>
            <div class="side-footer w-100">
                <ul class="social-icons-simple darkcolor top40">
                    <li><a href="javascript:void(0)" class="facebook"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a href="javascript:void(0)" class="twitter"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a href="javascript:void(0)" class="insta"><i class="fab fa-instagram"></i> </a> </li>
                </ul>
                <p class="darkcolor">&copy;awfa-hq.org</p>
            </div>
        </div>
    </div>
    <div id="close_side_menu" class="tooltip"></div>
    <!-- End side menu -->
</header>

@yield('contenu')

<footer id="site-footer" class=" bgprimary padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <div class="footer_panel padding_bottom_half bottom20">                   
                    <div class="d-table w-100 address-item whitecolor bottom25">
                        <p class="d-table-cell align-middle bottom0">Site web:
                           <a class="d-block" href="afwa-hq.org"> <strong>afwa-hq.org</strong></a>
                        </p>
                    </div>
                    @guest
                    <div class="d-table w-100 address-item whitecolor bottom25">
                        <p class="d-table-cell align-middle bottom0">   
                        <a class="d-block" href="/login"> <strong>Se connecter</strong></a>
                        </p>
                    </div>
                    @endguest
                    <ul class="social-icons white wow fadeInUp" data-wow-delay="300ms">
                        <li><a href="javascript:void(0)" class=""><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="javascript:void(0)" class=""><i class="fab fa-twitter"></i> </a> </li>
                        <li><a href="javascript:void(0)" class=""><i class="fab fa-linkedin-in"></i> </a> </li>
                        <li><a href="javascript:void(0)" class=""><i class="fab fa-instagram"></i> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer ends-->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../assets/vendor/js/bundle.min.js"></script>
<!--to view items on reach-->
<script src="../assets/vendor/js/jquery.appear.js"></script>
<!--Owl Slider-->
<script src="../assets/vendor/js/owl.carousel.min.js"></script>
<!--Parallax Background-->
<script src="../assets/vendor/js/parallaxie.min.js"></script>
<!--Cubefolio Gallery-->
<script src="../assets/vendor/js/jquery.cubeportfolio.min.js"></script>
<!--Fancybox js-->
<script src="../assets/vendor/js/jquery.fancybox.min.js"></script>
<!--wow js-->
<script src="../assets/vendor/js/wow.min.js"></script>
<!--number counters-->
<script src="../assets/vendor/js/jquery-countTo.js"></script>
<!--tooltip js-->
<script src="../assets/vendor/js/tooltipster.min.js"></script>
<!--Revolution SLider-->
<script src="../assets/vendor/js/jquery.themepunch.tools.min.js"></script>
<script src="../assets/vendor/js/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
<script src="../assets/vendor/js/extensions/revolution.extension.actions.min.js"></script>
<script src="../assets/vendor/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="../assets/vendor/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="../assets/vendor/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="../assets/vendor/js/extensions/revolution.extension.migration.min.js"></script>
<script src="../assets/vendor/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="../assets/vendor/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="../assets/vendor/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="../assets/vendor/js/extensions/revolution.extension.video.min.js"></script>
<!--contact form-->
<script src="../assets/vendor/js/contact_us.js"></script>
<!--custom functions and script-->
<script src="../assets/construction/js/functions.js"></script>
@yield('js')
</body>
</html>
</body>
</html>