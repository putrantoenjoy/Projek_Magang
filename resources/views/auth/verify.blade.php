@extends('layouts.master')
@section ('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>

<div class="container">
    @if (Auth::user()->email_verified_at === null)
    <div class="modal fade show" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog" style="display: block; background-color: #00000099">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Email</h5>
                    <button type="button" onclick="closeModalButton()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Email anda sudah dikirim. Jika anda belum menerima email, silahkan klik <a href="{{ route('verification.send') }}" class="text-decoration-none">disini</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <h2 class="text-white">Dashboard</h2>
            {{-- <p class="btn btn-success">Email telah dikirim!</p> --}}
            {{-- {{ Auth::user()->email_verified_at }} --}}
            <h3 class="text-white"><span id="greeting"></span> {{ Auth::user()->name }}</h3>
            <h5 class="text-white"><span id="date"></span></h5>
        </div>
        <div class="content__boxed">
            <div class="content__wrap p-0">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center gap-3">
                                <i class="bi bi-people-fill" style="font-size: 4rem;"></i>
                                <div class="ml-3">
                                    <p class="mar-no">Total User</p>
                                    <p class="text-2x mar-no text-semibold">{{ count($user) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center gap-3">
                                <i class="bi bi-newspaper" style="font-size: 4rem;"></i>
                                <div class="ml-3">
                                    <p class="mar-no">Total Artikel</p>
                                    <p class="text-2x mar-no text-semibold">{{ count($artikel) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center gap-3">
                                <i class="bi bi-images" style="font-size: 4rem;"></i>
                                <div class="ml-3">
                                    <p class="mar-no">Galeri</p>
                                    <p class="text-2x mar-no text-semibold">{{ count($galeri) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Artikel Terbaru</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if (!empty($artikel))
                                        @foreach ($artikel as $value)
                                            <div class="col-sm-4 mb-4">
                                                <div class="card shadow">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">{{ $value->judul }}</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>{{ $value->deskripsi }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">Belum ada artikel </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    // Fungsi untuk mendapatkan ucapan selamat berdasarkan waktu
    function getGreeting() {
        var date = new Date();
        var hours = date.getHours();

        if (hours >= 5 && hours < 12) {
            return "Selamat Pagi";
        } else if (hours >= 12 && hours < 18) {
            return "Selamat Siang";
        } else {
            return "Selamat Malam";
        }
    }

    // Fungsi untuk mengupdate teks selamat siang dan tanggal setiap detik
    function updateGreetingAndDate() {
        var greetingElement = document.getElementById('greeting');
        var dateElement = document.getElementById('date');

        greetingElement.textContent = getGreeting();
        dateElement.textContent = new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    }

    // Memanggil fungsi update setiap detik
    setInterval(updateGreetingAndDate, 1000);

    // document.getElementById("closeModal").addEventListener('click', function () {
    //     console.log("tes");
    // });
    function closeModalButton() {
        $('#staticBackdrop').removeClass('show').attr('aria-hidden', 'true').css('display', 'none');
        $('.modal-backdrop').remove();
        $('#body').removeClass();
        $('#body').css('padding-right','');
    }
</script>
