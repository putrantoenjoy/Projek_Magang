@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form method="POST" action="{{ route('login') }}" style="width: 23rem">
                    @csrf
                    <h3 class="fw-normal mb-2 pb-3" style="letter-spacing: 1px;">Log in</h3>
                    <p>Login untuk akses akun anda</p>
                    <div class="row mb-2">
                        <label for="email" class="col-md-12 col-form-label">{{ __('Email') }}</label>
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 text-start">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link mt-3" href="{{ route('password.request') }}">{{ __('Lupa Password?') }}</a>
                            @endif
                        </div>
                        <div class="col-md-6 text-end">
                            @if (Route::has('register'))
                                <a class="btn btn-link mt-3" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                            @endif
                        </div>
                    </div>                    

                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block col-md-12">{{ __('Login') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
