<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title', 'NusaDataPrima - Beranda')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('multi/assets/img/') }}" rel="icon">
  <link href="{{ url('multi/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('multi/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ url('multi/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('multi/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('multi/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('multi/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('multi/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('multi/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('multi/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('multi/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
  @include('layouts.user_navbar')

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="footer-info">
              <h3>Nusa Data Prima</h3>
              <p> Kediri <br><br>
                <strong>Phone:</strong> 085 730 726 752<br>
                <strong>Email:</strong> kurnia@mail<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://www.youtube.com/@bagusktp" class="youtube"><i class="bx bxl-youtube"></i></a>
                <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('layanan')}}">Layanan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('event-kami')}}">Event</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('galeri-kami')}}">Galeri</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('tentang-kami')}}">Tentang Kami</a></li>
              @if (Route::has('login'))
                @auth
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
                @endauth
            @endif
            </ul>
          </div>    

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Link Lainnya</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Media</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('artikel-kami')}}">Artikel</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('tim-kerja')}}">Tim Kerja</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Toko</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Nusa Data Prima</span></strong>. All Rights Reserved {{ date("Y") }}
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('multi/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ url('multi/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ url('multi/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('multi/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('multi/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('multi/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('multi/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('multi/assets/js/main.js') }}"></script>
</body>

</html>
