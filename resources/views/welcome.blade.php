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
              <h2 class="animate__animated animate__fadeInDown">CCTV</h2>
              <p class="animate__animated animate__fadeInUp">Tingkatkan keamanan rumah Anda dengan solusi terintegrasi dari Kami. Nikmati sistem CCTV modern dengan kualitas gambar jernih, pemantauan real-time, dan fitur canggih yang dirancang untuk melindungi Anda dan keluarga. Solusi kami memberikan ketenangan pikiran, memastikan keamanan rumah Anda tetap terjaga kapan saja dan di mana saja.</p>
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
                    <h4>Traveler</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      Saya sering bepergian untuk bekerja dan selalu khawatir meninggalkan rumah saya tanpa pengawasan. Setelah memasang sistem CCTV dari NusaDataPrima, saya merasa jauh lebih tenang. Saya dapat memantau rumah saya secara real-time dari mana saja di dunia, dan saya menerima notifikasi instan jika terjadi aktivitas mencurigakan. Sistem ini sangat mudah digunakan dan gambarnya sangat jernih. Saya sangat senang dengan pembelian saya dan saya merekomendasikan NusaDataPrima kepada siapa pun yang mencari sistem keamanan rumah yang andal.
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
                      Saya menjalankan bisnis online dan stabilitas koneksi internet sangat penting bagi saya. Sejak beralih ke NusaDataPrima, saya tidak pernah mengalami masalah internet lagi. Koneksi mereka sangat stabil dan handal, sehingga saya dapat bekerja dengan lancar tanpa gangguan. Saya sangat merekomendasikan NusaDataPrima kepada semua pemilik bisnis yang membutuhkan koneksi internet yang dapat diandalkan.
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
                      Sistem CCTV dari NusaDataPrima telah memberi saya ketenangan pikiran. Saya dapat memantau rumah saya secara real-time dari mana saja, dan saya menerima notifikasi instan jika terjadi aktivitas mencurigakan. Saya sangat merekomendasikan NusaDataPrima kepada semua orang yang mencari sistem keamanan yang andal.
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
                      Saya sangat senang dengan kecepatan internet baru dari NusaDataPrima. Sekarang saya dapat streaming film dan video tanpa buffering, dan saya dapat mengunduh file besar dengan cepat dan mudah. Terima kasih NusaDataPrima.
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
