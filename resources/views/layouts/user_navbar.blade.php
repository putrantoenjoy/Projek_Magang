<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      {{-- <h1 class="logo"><a href="index.html">Multi</a></h1> --}}
      <a href="{{ route('beranda') }}" class="logo"><img src="{{ asset('logo/logo.png') }}" alt="" class="img-fluid"></a>
  
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ Request::is('beranda') ? 'active' : '' }}" href="{{route('beranda')}}">Beranda</a></li>
          <li><a class="nav-link scrollto {{ Request::is('layanan') ? 'active' : '' }}" href="{{route('layanan')}}">Layanan</a></li>
          <li><a class="nav-link scrollto {{ Request::is('event-kami') ? 'active' : '' }}" href="{{route('event-kami')}}">Event</a></li>
          <li><a class="nav-link scrollto {{ Request::is('galeri-kami') ? 'active' : '' }}" href="{{route('galeri-kami')}}">Galeri</a></li>
          <li><a class="nav-link scrollto {{ Request::is('tentang-kami') ? 'active' : '' }}" href="{{route('tentang-kami')}}">Tentang Kami</a></li>
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a class="nav-link scrollto" href="#toko">Toko</a></li>
          <li>
        @if (Route::has('login'))
        @auth
            <a class="getstarted scrollto" href="{{ route('dashboard') }}">Home</a>
          @else
            <a class="getstarted scrollto" href="{{ route('login') }}">Login</a>
          @endauth
        @endif
        </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  