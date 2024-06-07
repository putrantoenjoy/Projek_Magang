@extends('layouts.user_master')

@section('content')
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up" style="padding-top: 100px;">
        <div class="row g-5">
            <div class="col-lg-8">
                <article class="blog-details card">
                    <div class="d-flex justify-content-center">
                        <div class="post-img d-flex justify-content-center my-3" style="width: 300px; height: 300px; overflow: hidden;">
                            <img src="{{ asset('storage/img/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="d-flex" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>

                    <h2 class="title">{{ $artikel->judul }}</h2>

                    <div class="meta-top mb-3">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> {{ $artikel->penulis }}</li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="{{ $artikel->created_at }}">{{ $artikel->created_at->format('M d, Y') }}</time></li>
                        </ul>
                    </div><!-- End meta top -->

                    <div class="content">
                        {!! $artikel->konten !!}
                    </div><!-- End post content -->

                    <div class="meta-bottom">
                        <ul class="category">
                            <li><td>Kategori : {{ $artikel->kategori->nama }} </td></li>
                        </ul>
                    </div><!-- End meta bottom -->

                </article><!-- End blog post -->
            </div>

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
                                        <a href="{{ route('artikel-kami', ['kategori' => $kategori->id]) }}" class="list-group-item list-group-item-action">{{ $kategori->nama }}</a>
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
</section><!-- End Blog Details Section -->
@endsection
