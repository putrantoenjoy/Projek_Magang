<!doctype html>
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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>


<div class="d-flex vh-100">
    <div class="col-md-8 bg-secondary d-flex justify-content-center">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image" style="max-width: 50%;">
    </div>
    <div class="col-md-4 bg-white">
        {{-- selamat datang --}}
        <div class="d-flex justify-content-center py-5">
            <img src="{{ asset('logo/logo.png') }}" alt="logo" style="max-width: 50%">
        </div>
        {{-- <div class="row justify-content-center"> --}}
            <div class="mx-5">
                <div class="my-3">
                    Silahkan Login dengan Email Anda
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="my-3">
                        <label for="email">Email</label>
                        <input type="email" id="emai" name="email" class="form-control" required>
                        <label for="password">Passwod</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <div class="my-3">
                            <a href="{{ route('register') }}" class="text-decoration-none">Belum punya akun?</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn form-control btn-primary mb-5">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        {{-- </div> --}}
    </div>
</div>
</body>
