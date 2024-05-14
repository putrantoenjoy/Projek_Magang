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
<body class="bg-secondary">
    <div class="d-flex py-5 justify-content-center">
        <div class="col-md-4">
            <div class="card p-5">
                <div class="d-flex justify-content-center pb-5">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo" style="max-width: 50%">
                </div>
                <p>Masukkan alamat email yang terkait dengan akun Anda untuk mengatur ulang kata sandi</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="d-flex flex-column">
                        <div class="mb-3">
                            <label for="email" class="col-md-4 col-form-label p-0">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Lanjutkan
                            </button>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            Belum punya akun?&nbsp;<a href="{{ route('register') }}" class="text-decoration-none">Daftar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
