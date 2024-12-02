@extends('layouts.user_master')
@section('content')
      <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="4000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">
        {{-- slide --}}
        {{-- @foreach ($collection as $item)
          <div class="carousel-item active" style="background-image: url(multi/assets/img/slide/network.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Network Service</h2>
                <p class="animate__animated animate__fadeInUp">Tingkatkan konektivitas internet Anda dengan solusi terintegrasi dari Kami</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>
              </div>
            </div>
          </div>
        @endforeach --}}
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(multi/assets/img/slide/network.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Network Service</h2>
              <p class="animate__animated animate__fadeInUp text-justify">Tingkatkan konektivitas internet Anda dengan solusi terintegrasi dari Kami. Nikmati kecepatan tinggi, kestabilan jaringan, dan layanan pelanggan terbaik yang dirancang khusus untuk memenuhi kebutuhan Anda, baik untuk keperluan rumah tangga maupun bisnis. Solusi inovatif Kami memastikan Anda tetap terhubung kapan saja dan di mana saja.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>
            </div>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(multi/assets/img/slide/router.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Router Berkualitas</h2>
              <p class="animate__animated animate__fadeInUp">Tingkatkan pengalaman internet Anda dengan router WiFi canggih dari Kami. Dirancang untuk memberikan koneksi stabil dan cepat di setiap sudut rumah atau kantor, router kami memastikan Anda tetap terhubung tanpa gangguan. Dengan fitur keamanan tingkat lanjut, pengaturan yang mudah, dan kompatibilitas yang luas, router kami adalah solusi sempurna untuk kebutuhan internet sehari-hari Anda. Nikmati kecepatan tinggi dan konektivitas tanpa batas, ideal untuk streaming, gaming, dan bekerja secara online tanpa hambatan.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Testimoni</h2>
            <p>Testimoni</p>
          </div>
  
          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="multi/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>Sera Maya</h3>
                    <h4>Pemilik Kost</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      Memberikan kenyamanan bagi penghuni adalah prioritas utama, dan koneksi internet yang cepat dan stabil adalah salah satu fasilitas yang penting. Layanan internet dari provider ini benar-benar membantu meningkatkan pengalaman penghuni kost kami. Mereka bisa bekerja, streaming, dan bermain game tanpa gangguan. Kami sangat puas dengan kualitas layanan yang diberikan, serta dukungan pelanggan yang selalu siap membantu. Ini adalah pilihan yang tepat untuk bisnis kost saya
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->
  
              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="multi/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                    <h3>Citra Kiranti</h3>
                    <h4>Pemilik Cafe</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      Sebagai pemilik kafe, koneksi internet yang cepat dan stabil sangat penting untuk kepuasan pelanggan kami. Layanan internet dari provider ini benar-benar membantu, dengan kecepatan tinggi yang mendukung pengunjung kami untuk streaming, browsing, dan bekerja. Tidak ada lagi keluhan tentang koneksi yang lemot. Layanan pelanggan juga sangat responsif dan membantu setiap kali kami membutuhkan dukungan. Sangat puas dengan layanan ini
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->
  
              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="multi/assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                    <h3>Moch Hattah</h3>
                    <h4>Guru</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      Di lingkungan sekolah, koneksi internet yang stabil adalah kunci utama. Layanan internet dari provider ini sangat membantu saya dalam mengajar dengan lancar, tanpa gangguan atau buffering. Pengalaman mengajar jadi lebih efektif karena kecepatan internet yang tinggi dan kualitas yang terjamin. Sangat puas dengan layanan ini untuk mendukung kegiatan belajar mengajar.
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->
  
              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="multi/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                    <h3>Budi Setiawan</h3>
                    <h4>Streamer</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      Router yang saya beli dari provider ini benar-benar meningkatkan kualitas koneksi di rumah. Jangkauannya luas dan sinyal tetap kuat meskipun berada di sudut rumah yang jauh. Kecepatan internetnya meningkat, dan kini saya bisa menikmati streaming dan gaming tanpa gangguan. Pemasangannya sangat mudah dan pengaturannya simpel. Router ini sangat ideal untuk rumah dengan banyak perangkat yang terhubung.
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section><!-- End Testimonials Section -->
@endsection
