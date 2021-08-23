<!DOCTYPE html>
<html lang="en">

<head>
    <title>Job Finder &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->


        <div class="site-navbar-wrap js-site-navbar bg-white">

            <div class="container">
                <div class="site-navbar bg-light">
                    <div class="py-1">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <h2 class="mb-0 site-logo"><a href="/">Job<strong class="font-weight-bold">Finder</strong> </a></h2>
                            </div>
                            <div class="col-10">
                                <nav class="site-navigation text-right" role="navigation">
                                    <div class="container">
                                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                                            <li class="has-children">
                                                <a href="{{route('about')}}">About</a>
                                                <ul class="dropdown arrow-top">
                                                    <li><a href="{{route('team')}}">Team</a></li>
                                                    <li><a href="{{route('services')}}">Services</a>
                                                    <li><a href="{{route('categories')}}">Categories</a></li>
                                                    <li><a href="{{route('Q&A')}}">Q&A</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{route('singlejob')}}">A Job</a></li>
                                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                                            @guest
                                            <li class="nav-item"><a class="nav-link" href="{{url('login')}}">Login</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{url('register')}}">Register</a></li>
                                            @endguest
                                            @auth
                                            @if(Auth::user()->type == 'person')
                                            <li class="nav-item">
                                                <form action="{{url('logout')}}" method="POST">
                                                    @csrf
                                                    <input type="submit" value="logout" class="btn btn-primary">
                                                </form>
                                            <li class="nav-item">welcome, {{Auth::user()->name}}</li>
                                            </li>
                                            @else
                                            <li class="nav-item">
                                                <form action="{{url('logout')}}" method="POST">
                                                    @csrf
                                                    <input type="submit" value="logout" class="btn btn-primary">
                                                </form>
                                            <li><a href="{{route('newjob')}}"><span class="bg-primary text-white py-3 px-4 rounded"><span class="icon-plus mr-3"></span>Post New Job</span></a></li>

                                            <li class="nav-item">welcome, {{Auth::user()->name}}</li>
                                            </li>
                                            @endif
                                            @endauth
                                            


                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
