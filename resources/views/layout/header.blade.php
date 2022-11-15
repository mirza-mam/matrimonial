<!doctype html>
<html lang="en">

<head>
    @stack('header')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6.2.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick-theme.css') }}">
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <!-- (Optional) Use CSS or JS implementation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <link href="{{ asset('front/stylesheet.css') }}" rel="stylesheet">

</head>

<body>
    <header>
        <nav class="bg-light p-2 fixed-top">
            <div class="row">
                <a class="col-2 navbar-brand font-heading text-center" href="{{ route('user.home') }}"><img src="{{ asset('front/images/logo.png') }}" height="50px" width="50px"></a>
                <div class="col-8 d-flex justify-content-center header-top-center"><a class="navbar-brand font-heading text-center" href="{{ route('user.home') }}">Pakistan's Top Matrimonial Platform</a></div>
                <div class="col-2 d-flex justify-content-between">
                    @if (session()->has('user'))
                        <a href="{{ route('user-logout') }}" class="btn login_btn">Logout</a>
                        <a href="{{ route('user-profile') }}" class="btn register_btn">My Account</a>
                    @else
                        <button type="button" class="btn login_btn" data-mdb-toggle="modal"
                            data-mdb-target="#loginModal">Login</button>
                        <a href="{{ route('user.signup') }}" class="btn register_btn">Register</a>
                    @endif
                </div>
            </div>
        </nav>
        <div class="header" style="height: 50px;margin-top: 65px">
        </div>
        <nav class="navbar navbar-expand-lg navbar-scroll bg_gray">
            <div class="container-fluid">
                <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="d-flex justify-content-start align-items-center">
                        <i class="fas fa-bars text-white"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse float-end" id="navbarExample01"
                    style="justify-content: space-around;">
                    <ul class="navbar-nav d-flex justify-between">
                        <!-- Icons -->
                        <li class="nav-item">
                            <a class="nav-link font-heading text-white" href="{{ route('user.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-heading text-white"
                                href="{{ route('user.privacy-policy') }}">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-heading text-white"
                                href="{{ route('user.about-us') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-heading text-white"
                                href="{{ route('user.services') }}">Services</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
