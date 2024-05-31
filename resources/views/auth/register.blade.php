<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nusa Data Prima - Register</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>


<div class="d-flex bg-secondary justify-content-center py-5">
    {{-- <div class="col-md-8 bg-secondary vh-100 d-flex justify-content-center position-fixed">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image" style="max-width: 50%;">
    </div> --}}
    <div class="col-md-4 bg-white top-0 end-0 rounded">
        {{-- selamat datang --}}
        <div class="d-flex justify-content-center py-5">
            <img src="{{ asset('logo/logo.png') }}" alt="logo" style="max-width: 50%">
        </div>
        {{-- <div class="row justify-content-center"> --}}
            <div class="mx-5">
                <div class="my-3">
                    Silahkan daftar dengan Email Anda
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="my-3">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="name" class="form-control" required>
                        <label for="username">Username</label>
                        <input type="username" id="username" name="username" class="form-control">
                        <label for="email">Email</label>
                        <input type="email" id="emai" name="email" class="form-control" required>
                        <label for="password">Passwod</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <label for="confirm_password">Konfirmasi Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                        <div class="my-3">
                            <a href="{{ route('login') }}" class="text-decoration-none">Sudah memiliki akun?</a>
                        </div>
                        <div class="">
                            <button type="submit" class="btn form-control btn-primary mb-5">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        {{-- </div> --}}
    </div>
</div>
</body>
