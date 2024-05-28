@extends('layouts.user_master')

@section('content')
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row g-5">

            <div class="col-lg-8">

                <article class="blog-details">

                    <div class="post-img">
                        <img src="{{ asset('storage/img/artikel' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid">
                    </div>

                    <h2 class="title">{{ $artikel->judul }}</h2>

                    <div class="meta-top">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ $artikel->penulis }}</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{ $artikel->created_at }}">{{ $artikel->created_at->format('M d, Y') }}</time></a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li>
                        </ul>
                    </div><!-- End meta top -->

                    <div class="content">
                        {!! $artikel->konten !!}
                    </div><!-- End post content -->

                    <div class="meta-bottom">
                        <i class="bi bi-folder"></i>
                        <ul class="cats">
                            <li><a href="#">Business</a></li>
                        </ul>

                        <i class="bi bi-tags"></i>
                        <ul class="tags">
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>
                    </div><!-- End meta bottom -->

                </article><!-- End blog post -->

                <div class="post-author d-flex align-items-center">
                    <img src="{{ asset('storage/img/artikel' . $artikel->penulis_image) }}" class="rounded-circle flex-shrink-0" alt="{{ $artikel->penulis }}">
                    <div>
                        <h4>{{ $artikel->penulis }}</h4>
                        <div class="social-links">
                            <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                            <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                            <a href="https://instagram.com/#"><i class="bi bi-instagram"></i></a>
                        </div>
                        <p>
                            {{ $artikel->penulis_bio }}
                        </p>
                    </div>
                </div><!-- End post author -->

                <div class="comments">
                    <!-- Comments section here -->
                </div><!-- End blog comments -->

            </div>

            <div class="col-lg-4">

                <div class="sidebar">
                    <!-- Sidebar content here -->
                </div><!-- End Blog Sidebar -->

            </div>
        </div>

    </div>
</section><!-- End Blog Details Section -->
@endsection
