<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        @include('layouts.user_navbar')
        
        <div class="container-fluid p-0">
            @yield('content')
        </div>
        
        <div class="bg-primary">
            <div class="container">
                <footer class="pt-5">
                    <div class="row">
                        <div class="col-6 col-md-2 mb-3 text-white">
                            <img src="{{ asset('logo/logo.png') }}" alt="logo" style="max-width: 70%">
                            <ul class="nav flex-column my-3">
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none fs-5">Kediri</a></li>
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">08123123123</a></li>
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">Email@gmail.com</a></li>
                            </ul>
                            <ul class="list-unstyled d-flex m-0">
                                <li class="me-3"><a class="link-dark" href="#"><i class="bi text-white fs-3 bi-facebook"></i></a></li>
                                <li class="me-3"><a class="link-dark" href="#"><i class="bi text-white fs-3 bi-instagram"></i></a></li>
                                <li class="me-3"><a class="link-dark" href="#"><i class="bi text-white fs-3 bi-twitter"></i></a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-md-2 mb-3 text-white">
                            <h5 class="fw-bold">Menu</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">Layanan</a></li>
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">Event</a></li>
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">Galeri</a></li>
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">Tentang kami</a></li>
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">Toko</a></li>
                                @if (Route::has('login'))
                                    @auth
                                        <li class="nav-item mb-2"><a href="{{ route('home') }}" class="text-white text-decoration-none">home</a></li>
                                    @endauth
                                @endif
                            </ul>
                        </div>

                        <div class="col-6 col-md-2 mb-3 text-white">
                            <h5 class="fw-bold">Link Lainnya</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">Media</a></li>
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">Blog</a></li>
                                <li class="nav-item mb-2"><a href="#" class="text-white text-decoration-none">Tim kerja</a></li>
                            </ul>
                        </div>

                        <div class="col-md-5 offset-md-1 mb-3">
                            <form>
                                <h5 class="text-white">Subscribe to our newsletter</h5>
                                <p class="text-white">Monthly digest of what's new and exciting from us.</p>
                                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                    <label for="newsletter1" class="visually-hidden">Email address</label>
                                    <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                    <button class="btn btn-dark" type="button">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-sm-row py-4 align-items-center justify-content-center border-top">
                        <p class="m-0 text-center text-white">&copy; Copyright Nusa Data Prima. All Rights Reserved {{ date("Y") }}.</p>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
