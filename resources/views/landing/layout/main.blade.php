<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('') }}/assets/img/logo.jpg">
    {{-- <link rel="manifest" href="{{ url('') }}/assets/landing/favicon/manifest.json"> --}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('') }}/assets/landing/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/line-awesome.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/daterangepicker.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/animate.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/animated-headline.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/landing/css/style.css">
    <style>
        .logo img {
            width: 12%;
        }
        @media (min-width:1025px) {
            .logo {
                width: 40%;
            }
        }
    </style>
    @yield('css-library')
    @yield('css-custom')
</head>
<body>

<!-- ================================
            START HEADER AREA
================================= -->
<header class="header-area">
    @include('landing/layout/navbar')
</header>
<!-- ================================
         END HEADER AREA
================================= -->

@yield('content')

<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area section-bg padding-bottom-30px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="copy-right padding-top-30px">
                    <p class="copy__desc">
                        &copy; Copyright ©<script>document.write(new Date().getFullYear());</script> | O'RBS MEDICA
                    </p>
                </div><!-- end copy-right -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5" style="margin-top: 20px;">
                <div class="footer-social-box text-right">
                    <ul class="social-profile">
                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                        <li><a href="#"><i class="lab la-instagram"></i></a></li>                            <li><a href="#"><i class="lab la-youtube"></i></a></li>
                    </ul>
                </div>      
            </div><!-- end col-lg-4 -->
            <!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- Template JS Files -->
<script src="{{ url('') }}/assets/landing/js/jquery-3.4.1.min.js"></script>
<script src="{{ url('') }}/assets/landing/js/jquery-ui.js"></script>
<script src="{{ url('') }}/assets/landing/js/popper.min.js"></script>
<script src="{{ url('') }}/assets/landing/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/assets/landing/js/bootstrap-select.min.js"></script>
<script src="{{ url('') }}/assets/landing/js/moment.min.js"></script>
<script src="{{ url('') }}/assets/landing/js/daterangepicker.js"></script>
<script src="{{ url('') }}/assets/landing/js/owl.carousel.min.js"></script>
<script src="{{ url('') }}/assets/landing/js/jquery.fancybox.min.js"></script>
<script src="{{ url('') }}/assets/landing/js/jquery.countTo.min.js"></script>
<script src="{{ url('') }}/assets/landing/js/animated-headline.js"></script>
<script src="{{ url('') }}/assets/landing/js/jquery.ripples-min.js"></script>
<script src="{{ url('') }}/assets/landing/js/quantity-input.js"></script>
<script src="{{ url('') }}/assets/landing/js/main.js"></script>
@yield('js-library')
@yield('js-custom')
</body>

</html>