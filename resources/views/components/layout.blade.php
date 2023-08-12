<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Bingo | Responsive Multipurpose Parallax HTML5 Template</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="One page parallax responsive HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Bingo HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" />

    <!-- CSS
    ================================================== -->
    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{asset('plugins/themefisher-font/style.css')}}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">
    <!-- Lightbox.min css -->
    <link rel="stylesheet" href="{{asset('plugins/lightbox2/css/lightbox.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('plugins/animate/animate.css')}}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('plugins/slick/slick.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">



</head>
<body id="body">

<!--
Start Preloader
==================================== -->
<div id="preloader">
    <div class='preloader'>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!--
End Preloader
==================================== -->

<!--
Fixed Navigation
==================================== -->
<header class="navigation fixed-top">
    <div class="container">
        <!-- main nav -->
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <!-- logo -->
            <a class="navbar-brand logo" href="/">
                <img loading="lazy" class="logo-default" src="{{asset('images/logo.png')}}" alt="logo" />
                <img loading="lazy" class="logo-white" src="{{asset('images/logo-white.png')}}" alt="logo" />
            </a>
            <!-- /logo -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
                        <a class="nav-link" href="/">
                            Homepage
                        </a>
                    </li>
                    <li class="nav-item {{request()->is('about') ? 'active' : ''}}">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                    <li class="nav-item {{request()->is('service') ? 'active' : ''}} ">
                        <a class="nav-link" href="/service">Services</a>
                    </li>
                    <li class="nav-item {{request()->is('portfolio') ? 'active' : ''}}">
                        <a class="nav-link" href="/portfolio
                        ">Portfolio</a>
                    </li>
                    <li class="nav-item {{request()->is('pricing') ? 'active' : ''}} ">
                        <a class="nav-link" href="/pricing">Pricing</a>
                    </li>
                    <li class="nav-item {{request()->is('contact') ? 'active' : ''}}">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown02" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Pages <i class="tf-ion-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown02">
                                @if (Route::has('login'))
                                        @auth

                                            <li>
                                                 <a href="{{ url('/profile') }}" class="dropdown-item">Profile</a>

                                                @can('access-dashboard')
                                                    <a href="{{ url('/admin') }}" class="dropdown-item">Dashboard</a>
                                                @endcan

                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-dropdown-link :href="route('logout')"
                                                                     onclick="event.preventDefault();
                                                                     this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>


                                            </li>
                                        @else
                                            <li>
                                                 <a href="{{ route('login') }}" class="dropdown-item">Log in</a>
                                            </li>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                                            @endif
                                        @endauth
                                @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /main nav -->
    </div>
</header>
<!--
End Fixed Navigation
==================================== -->

{{$slot}}

<footer id="footer" class="bg-one">
    <div class="top-footer">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <h3>about</h3>
                    <p>Integer posuere erat a ante venenati dapibus posuere velit aliquet. Fusce dapibus, tellus cursus commodo, tortor mauris sed posuere.</p>
                </div>
                <!-- End of .col-sm-3 -->

                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <ul>
                        <li>
                            <h3>Our Services</h3>
                        </li>
                        <li><a href="/service">Ui/Ux Design</a></li>
                        <li><a href="/service">Graphic Design</a></li>
                        <li><a href="/service">Web Design</a></li>
                        <li><a href="/service">Web Development</a></li>
                    </ul>
                </div>
                <!-- End of .col-sm-3 -->

                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <ul>
                        <li>
                            <h3>Quick Links</h3>
                        </li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/service">Services</a></li>
                        <li><a href="/posts">Blogs</a></li>
                    </ul>
                </div>

            </div>
        </div> <!-- end container -->
    </div>

</footer> <!-- end footer -->


<!-- end Footer Area
========================================== -->
<!--
    Essential Scripts
    =====================================-->
<!-- Main jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<!-- Bootstrap4 -->
<script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- Parallax -->
<script src="{{asset('plugins/parallax/jquery.parallax-1.1.3.js')}}"></script>
<!-- lightbox -->
<script src="{{asset('plugins/lightbox2/js/lightbox.min.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{asset('plugins/slick/slick.min.js')}}"></script>
<!-- filter -->
<script src="{{asset('plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<!-- Smooth Scroll js -->
<script src="{{asset('plugins/smooth-scroll/smooth-scroll.min.js')}}"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
<script src="{{asset('plugins/google-map/gmap.js')}}"></script>

<!-- Custom js -->
<script src="{{asset('js/script.js')}}"></script>

</body>

</html>
