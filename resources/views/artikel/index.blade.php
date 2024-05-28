@extends('layouts.user_master')

@section('content')
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
                        @if ($index < 6)
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
                                        <p class="card-text">{{ Str::limit($artikel->konten, 150) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
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
                                <input type="text" class="form-control" placeholder="Cari..." name="search">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                        <h5 class="card-title">Kategori</h5>
                        <ul class="list-group mb-3">
                            {{-- @foreach($categories as $category) --}}
                                <li class="list-group-item">
                                    {{-- <a href="{{ route('artikel-kami', ['kategori' => $category->id]) }}">{{ $category->nama }}</a> --}}
                                </li>
                            {{-- @endforeach --}}
                        </ul>
                        <h5 class="card-title">Tag</h5>
                        <ul class="list-group mb-3">
                            {{-- @foreach($tags as $tag) --}}
                                <li class="list-group-item">
                                    {{-- <a href="{{ route('artikel-kami', ['tag' => $tag->id]) }}">{{ $tag->nama }}</a> --}}
                                </li>
                            {{-- @endforeach --}}
                        </ul>
                        <h5 class="card-title">Artikel Sebelumnya</h5>
                        {{-- @foreach ($previousArtikels as $prevArtikel) --}}
                            <div class="mb-2">
                                {{-- <a href="{{ route('artikel-kami.show', $prevArtikel->id) }}">{{ $prevArtikel->judul }}</a> --}}
                            </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection