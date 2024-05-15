<nav class="navbar navbar-expand-sm bg-primary navbar-dark p-0">
    <div class="container-fluid">
        <div class="m-1">
            <img src="{{ asset('logo/logo.png') }}" alt="logo" style="width: 70px">
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active fs-5 fw-bold" href="#">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active fs-5 fw-bold" href="#">Layanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active fs-5 fw-bold" href="#">Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active fs-5 fw-bold" href="#">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active fs-5 fw-bold" href="#">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active fs-5 fw-bold" href="#">Toko</a>
            </li>
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a class="nav-link active fs-5 fw-bold" href="{{ route('home') }}">Home</a>
                    </li>
                @else
                    <a class="nav-link active fs-5 fw-bold" href="{{ route('login') }}">Login</a>
                @endauth
            @endif
        </ul>
    </div>
</nav>
