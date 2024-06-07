@extends('layouts.user_master')

@section('content')
<style>
    .text-line {
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 1;
      /* number of lines to show */
      line-clamp: 1;
      -webkit-box-orient: vertical;
    }
</style>
<section id="blog" class="blog" style="padding-top: 100px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Artikel</h2>
            <p>Artikel Kami</p>
        </div>
        <div class="row g-5">
            <!-- Kolom Konten Artikel -->
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($artikels as $index => $artikel)
                        {{-- @if ($index < 6) --}}
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <img src="{{ asset('storage/img/artikel/' . $artikel->gambar) }}" class="card-img-top img-fluid" alt="{{ $artikel->judul }}">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('artikel-kami.show', $artikel->id) }}">{{ $artikel->judul }}</a>
                                        </h5>
                                        <div class="meta-top mb-2">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="bi bi-person"></i> {{ $artikel->penulis }}</li>
                                                <li class="list-inline-item"><i class="bi bi-clock"></i> <time datetime="{{ $artikel->created_at }}">{{ $artikel->created_at->format('d M Y') }}</time></li>
                                            </ul>
                                        </div>
                                        <p class="text-line">{{$artikel->deskripsi}}</p>
                                    </div>
                                </div>
                            </div>
                        {{-- @endif --}}
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        {{ $artikels->links() }}
                    </div>
                </div>
            </div>

         <!-- Kolom Sidebar -->
         <div class="col-lg-4">
            <div class="sidebar">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Cari Artikel</h5>
                        <form action="{{ route('artikel-kami') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" placeholder="Cari..." name="cari" class="form-control" autocomplete="off" value="{{ $cari }}">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                        <h5 class="card-title">Kategori</h5>
                        <div class="row mb-3">
                            @foreach($kategori as $kategori)
                                <div class="col-6">
                                    <a href="{{ route('artikel-kami', ['kategori' => $kategori->id]) }}" class="list-group-item list-group-item-action text-dark">{{ $kategori->nama }}</a>
                                </div>
                            @endforeach
                        </div>
                        <h5 class="card-title">Artikel Terbaru</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($artikelTerbaru as $artikelTerbaru)
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/img/artikel/' . $artikelTerbaru->gambar) }}" alt="{{ $artikelTerbaru->judul }}" class="me-3" style="width: 100px; height: 100px;">
                                        <div>
                                            <a href="{{ route('artikel-kami.show', $artikelTerbaru->id) }}">{{ $artikelTerbaru->judul }}</a>
                                            <p class="text-muted mb-0">{{ $artikelTerbaru->created_at->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection