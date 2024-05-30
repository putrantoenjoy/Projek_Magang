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

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($galeris as $galeri)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $galeri->kategori }}">
                    <img src="{{ asset('storage/img/galeri/' . $galeri->gambar) }}" class="img-fluid" alt="{{ $galeri->judul }}">
                    <div class="portfolio-info">
                        <h4>{{ $galeri->judul }}</h4>
                        <p>{{ $galeri->deskripsi }}</p>
                        <p>{{ $galeri->kategori }}</p>
                        <a href="{{ asset('storage/img/galeri/' . $galeri->gambar) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $galeri->judul }}"><i class="bi bi-zoom-in"></i></a>
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
