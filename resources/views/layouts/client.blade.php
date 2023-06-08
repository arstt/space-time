<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Space-Time</title>

    {{-- favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('client/img/favicon.png') }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('client/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('client/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('client/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('client/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{ asset('client/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('client/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('client/css/slicknav.css')}}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('client/css/style.css')}}">

    @yield('css')

</head>
<body>

    {{-- Header Start --}}
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="/">
                                        <h2>Space-Time</h2>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="{{ Route::is('/') ? 'active' : ''}}" href="{{route('welcome')}}">Home</a></li>
                                            <li><a class="{{ Route::is('destination') ? 'active' : ''}}" href="{{route('destination')}}">Destination</a></li>
                                            <li><a class="{{ Route::is('berita') ? 'active' : ''}}" href="{{route('berita')}}">Berita </a></li>
                                            <li><a class="{{ Route::is('about') ? 'active' : ''}}" href="{{route('about')}}">About </a></li>
                                            <li><a class="{{ Route::is('contact') ? 'active' : ''}}" href="{{route('contact')}}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <p> <i class="fa fa-phone"></i> +62 88888888888</p>
                                    </div>
                                    <div class="social_links d-none d-xl-block">
                                        <ul>
                                            <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    {{-- Header End --}}

    @yield('content')

    {{-- footer --}}
    <footer class="footer">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center"> Copyright &copy;2023 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by Space-Time</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- end footer --}}

    {{-- script --}}
    <script src="{{ asset('client/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{ asset('client/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('client/js/popper.min.js')}}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('client/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('client/js/ajax-form.js')}}"></script>
    <script src="{{ asset('client/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('client/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('client/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('client/js/scrollIt.js')}}"></script>
    <script src="{{ asset('client/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('client/js/wow.min.js')}}"></script>
    <script src="{{ asset('client/js/nice-select.min.js')}}"></script>
    <script src="{{ asset('client/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{ asset('client/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('client/js/plugins.js')}}"></script>
    <script src="{{ asset('client/js/gijgo.min.js')}}"></script>
    <script src="{{ asset('client/js/slick.min.js')}}"></script>
    {{-- script end --}}
</body>
</html>
