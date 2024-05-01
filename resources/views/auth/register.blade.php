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


<div class="d-flex">
    <div class="col-md-8 bg-secondary"></div>
    <div class="col-md-4 bg-white">
        {{-- selamat datang --}}
        <div class="d-flex justify-content-center py-5">
            <img src="{{ asset('logo/logo.png') }}" alt="logo" style="max-width: 50%">
        </div>
        {{-- <div class="row justify-content-center"> --}}
            <div class="mx-5">
                <div class="my-3">
                    Silahkan daftar dengan Email Anda
                </div>
                <div class="my-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control">
                    <label for="">Username</label>
                    <input type="text" class="form-control">
                    <label for="">Email</label>
                    <input type="text" class="form-control">
                    <label for="">Passwod</label>
                    <input type="text" class="form-control">
                    <label for="">Konfirmasi Password</label>
                    <input type="text" class="form-control">
                    <div class="my-3">
                        <a href="{{ route('login') }}" class="text-decoration-none">Sudah memiliki akun?</a>
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn form-control btn-primary mb-5">Register</button>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>
</body>
