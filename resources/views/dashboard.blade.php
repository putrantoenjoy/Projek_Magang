@extends('layouts.master')
@section ('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>

<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <h2 class="text-white">Dashboard</h2>
            <h3 class="text-white"><span id="greeting"></span> {{ Auth::user()->name }}</h3>
            <h5 class="text-white"><span id="date"></span></h5>
            @if(session('success'))
                <div class="text-white">{{ session('success') }}</div>
            @endif
        </div>
        <div class="content__boxed">
            <div class="content__wrap p-0">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center gap-3">
                                <i class="bi bi-people-fill" style="font-size: 4rem;"></i>
                                <div class="ms-3"> 
                                    <p class="mar-no">Total User</p>
                                    <p class="text-2x mar-no text-semibold">{{ $alldata }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center gap-3">
                                <i class="bi bi-newspaper" style="font-size: 4rem;"></i>
                                <div class="ms-3"> 
                                    <p class="mar-no">Total Artikel</p>
                                    <p class="text-2x mar-no text-semibold">{{ $artikel }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center gap-3">
                                <i class="bi bi-images" style="font-size: 4rem;"></i>
                                <div class="ms-3"> 
                                    <p class="mar-no">Galeri</p>
                                    <p class="text-2x mar-no text-semibold">{{ $galeri }}</p>
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
                                    @foreach ($artikelTerbaru as $artikelTerbaru)
                                        <div class="col-sm-4 mb-4">
                                            <div class="card" style="box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 10px;">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0"><a href="{{ route('artikel-kami.show', $artikelTerbaru->id)}}" style="color: black; text-decoration: none;">{{ $artikelTerbaru->judul }}</a></h4>
                                                    <p class="text-muted mb-0">{{ $artikelTerbaru->created_at->format('d M Y') }}</p>
                                                </div>
                                                <div class="card-body">
                                                    <p>{{($artikelTerbaru->deskripsi) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
