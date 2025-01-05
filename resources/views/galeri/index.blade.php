@extends('layouts.user_master')
@section('content')
<section id="portfolio" class="portfolio" style="padding-top: 100px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Galeri</h2>
            <p>Galeri Kami</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active">Semua</li>
                  <li data-filter=".filter-proyek">Proyek</li>
                  <li data-filter=".filter-acara">Acara</li>
                  <li data-filter=".filter-produk">Produk</li>
                  <li data-filter=".filter-sertifikat">Sertifikat</li>
                  <li data-filter=".filter-fasilitas">Fasilitas</li>
                  <li data-filter=".filter-klien">Klien</li>
                  <li data-filter=".filter-kegiatan_sosial">Kegiatan Sosial</li>
                </ul>
            </div>
        </div>
        <style>
            /* Styling untuk memastikan semua gambar di galeri memiliki ukuran yang konsisten */
            .portfolio-image img {
                width: 100%;          /* Mengisi lebar kontainer */
                height: 250px;        /* Menetapkan tinggi yang konsisten untuk gambar */
                object-fit: cover;    /* Memastikan gambar ter-crop dengan proporsional */
                border-radius: 8px;   /* Membuat sudut gambar melengkung */
            }
          
            /* Menambahkan styling untuk kontainer gambar */
            .portfolio-image {
                height: 250px;         /* Tinggi tetap untuk gambar */
                overflow: hidden;      /* Menyembunyikan bagian gambar yang keluar dari kontainer */
                position: relative;    /* Mengatur posisi gambar */
            }
          
            /* Styling untuk informasi di bawah gambar */
            .portfolio-info {
                padding: 15px;
                background-color: #fff;
                text-align: center;
                border-radius: 0 0 8px 8px;  /* Memberikan sudut melengkung pada bawah kontainer */
                box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);  /* Memberikan efek bayangan */
            }
          
            /* Memberikan jarak antara item-item galeri */
            .portfolio-item {
                margin-bottom: 30px;    /* Memberikan jarak antar gambar */
            }
          
            /* Styling untuk tampilan lightbox */
            .portfolio-lightbox {
                color: #1e78ff;      /* Warna ikon zoom-in */
                font-size: 24px;      /* Ukuran ikon */
                transition: color 0.3s; /* Efek transisi pada warna */
            }
          
            .portfolio-lightbox:hover {
                color: #0056b3;      /* Warna ikon saat hover */
            }
        </style>          
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($galeris as $galeri)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $galeri->kategori }}">
                    <div class="portfolio-image">
                        <img src="{{ asset('storage/img/galeri/' . $galeri->gambar) }}" class="img-fluid" alt="{{ $galeri->judul }}">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{ $galeri->judul }}</h4>
                        <p>{{ $galeri->deskripsi }}</p>
                        <p>{{ $galeri->kategori }}</p>
                        <a href="{{ asset('storage/img/galeri/' . $galeri->gambar) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $galeri->judul }}">
                            <i class="bi bi-zoom-in"></i>
                        </a>
                    </div>
                </div>
            @endforeach        
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $galeris->links() }}
        </div>
    </div>
</section>
@endsection
