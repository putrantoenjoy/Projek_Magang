@extends('layouts.master')
@section ('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>

<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <h2 class="text-white">Dashboard</h2>
            <p class="btn btn-success">Email telah dikirim!</p>
            <h3 class="text-white"><span id="greeting"></span> {{ Auth::user()->name }}</h3>
            <h5 class="text-white"><span id="date"></span></h5>
        </div>
        <div class="content__boxed">
            <div class="content__wrap p-0">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-people-fill" style="font-size: 4rem;"></i>
                                <div class="ml-3">
                                    <p class="mar-no">Total User</p>
                                    <p class="text-2x mar-no text-semibold">241</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-newspaper" style="font-size: 4rem;"></i>
                                <div class="ml-3">
                                    <p class="mar-no">Total Artikel</p>
                                    <p class="text-2x mar-no text-semibold">241</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-images" style="font-size: 4rem;"></i>
                                <div class="ml-3">
                                    <p class="mar-no">Galeri</p>
                                    <p class="text-2x mar-no text-semibold">241</p>
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
                                    <div class="col-sm-4 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Artikel Terbaru 1</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Artikel Terbaru 2</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Artikel Terbaru 3</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
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
</script>
