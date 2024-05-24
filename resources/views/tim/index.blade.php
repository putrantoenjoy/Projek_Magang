@extends('layouts.user_master')

@section('content')
<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg" style="padding-top: 100px;">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Tim Kerja</h2>
            <p>Tim Kerja Kami</p>
        </div>

        <div class="row">
            @foreach($timkerja as $tim)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 + 100 }}">
                    <img src="{{ url('storage/img/tim/'. $tim->foto) }}" class="img-fluid" alt="{{ $tim['nama'] }}">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{{ $tim['nama'] }}</h4>
                            <span>{{ $tim['jabatan'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Team Section -->
@endsection
