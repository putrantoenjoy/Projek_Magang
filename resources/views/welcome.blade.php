@extends('layouts.user_master')
@section('content')
    <div class="d-flex flex-column" style="background-color: #ffffff">
        <div class="py-5 d-flex flex-column">
            <div class="col-11"></div>
            <div class="col-1"></div>
        </div>
        <div style="background-color: #E6E6E6" class="w-100">
            <div class="container-fluid my-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="background-image: url('{{ asset('images/network-service.jpg') }}'); background-size: cover; background-position: center;">
                            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 300px;">
                                <h3 class="fw-bold">Network Service</h3>
                                <h5>Layanan jaringan internet</h5>
                                <button class="btn btn-primary">Selengkapnya</button>
                            </div>
                        </div>
                        <div class="carousel-item" style="background-image: url('{{ asset('images/cctv.jpg') }}'); background-size: cover; background-position: center;">
                            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 300px;">
                                <h3 class="fw-bold">CCTV</h3>
                                <h5>Sistem keamanan terintegrasi</h5>
                                <button class="btn btn-primary">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
    </div>
@endsection
