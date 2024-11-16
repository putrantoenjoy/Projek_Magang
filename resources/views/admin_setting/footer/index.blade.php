@extends('layouts.master')
@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Pengaturan</p>
            <h3 class="text-white fw-bold">Pengaturan footer</h3>
        </div>
        <div class="content__boxed">
            <div class="content__wrap">
    
                @if (session('status'))
                    <div class="alert alert-success" id="success">
                        {{ session('status') }}
                    </div>
                @elseif (session('delete'))
                    <div class="alert alert-danger" id="danger">
                        {{ session('delete') }}
                    </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Error!</strong> {!! implode('', $errors->all('<div>:message</div>')) !!}
                </div>  
                @endif
                <div class="gap-3">
                    <div class="card">
                        <div class=" p-5" id="" style="background: #1E78FF">
                            <div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="footer-info text-white">
                                                <h3 class="text-white">Nusa Data Prima</h3>
                                                <p>Kediri <br><br>
                                                    <strong>Phone:</strong> 085 730 726 752<br>
                                                    <strong>Email:</strong> kurnia@mail<br>
                                                </p>
                                                <div class="social-links mt-3">
                                                    <a href="#" class="facebook text-white" style="text-decoration: none;"><i class="bx bxl-facebook"></i></a>
                                                    <a href="#" class="instagram text-white" style="text-decoration: none;"><i class="bx bxl-instagram"></i></a>
                                                    <a href="https://www.youtube.com/@bagusktp" class="youtube text-white" style="text-decoration: none;"><i class="bx bxl-youtube"></i></a>
                                                    <a href="#" class="whatsapp text-white" style="text-decoration: none;"><i class="bx bxl-whatsapp"></i></a>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="col-lg-3 col-md-6 footer-links text-white">
                                            <h4 class="text-white">Menu</h4>
                                            <ul>
                                                <li><i class="bx bx-chevron-right"></i> <a href="{{route('layanan')}}" class="text-white" style="text-decoration: none;">Layanan</a></li>
                                                <li><i class="bx bx-chevron-right"></i> <a href="{{route('event-kami')}}" class="text-white" style="text-decoration: none;">Event</a></li>
                                                <li><i class="bx bx-chevron-right"></i> <a href="{{route('galeri-kami')}}" class="text-white" style="text-decoration: none;">Galeri</a></li>
                                                <li><i class="bx bx-chevron-right"></i> <a href="{{route('tentang-kami')}}" class="text-white" style="text-decoration: none;">Tentang Kami</a></li>
                                                @if (Route::has('login'))
                                                    @auth
                                                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}" class="text-white" style="text-decoration: none;">Home</a></li>
                                                    @endauth
                                                @endif
                                            </ul>
                                        </div>    
                
                                        <div class="col-lg-2 col-md-6 footer-links text-white">
                                            <h4 class="text-white">Link Lainnya</h4>
                                            <ul>
                                                <li><i class="bx bx-chevron-right"></i> <a href="#" class="text-white" style="text-decoration: none;">Media</a></li>
                                                <li><i class="bx bx-chevron-right"></i> <a href="{{route('artikel-kami')}}" class="text-white" style="text-decoration: none;">Artikel</a></li>
                                                <li><i class="bx bx-chevron-right"></i> <a href="{{route('tim-kerja')}}" class="text-white" style="text-decoration: none;">Tim Kerja</a></li>
                                                <li><i class="bx bx-chevron-right"></i> <a href="#" class="text-white" style="text-decoration: none;">Toko</a></li>
                                            </ul>
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                
                            <div class="container">
                                <div class="copyright text-center text-white">
                                    &copy; Copyright <strong><span>Nusa Data Prima</span></strong>. All Rights Reserved {{ date("Y") }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Memusatkan tombol Ubah -->
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ubah</button>
                    </div>
                </div>
            </div>  
        </div>
        @include('admin_setting.footer.modal_tambah') 
    </div>
</div>


@endsection