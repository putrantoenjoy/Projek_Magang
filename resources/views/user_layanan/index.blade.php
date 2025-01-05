@extends('layouts.master')
@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Layanan Internet</p>
            <h3 class="text-white fw-bold">Daftar Layanan Internet</h3>
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

                <div class="">
                    <style>
                        /* Styling teks dengan batas baris */
                        .text-limit {
                          overflow: hidden;
                          text-overflow: ellipsis;
                          display: -webkit-box;
                          -webkit-line-clamp: 4; /* Batasi hingga 2 baris */
                          -webkit-box-orient: vertical;
                          transition: max-height 0.3s ease;
                          max-height: 7.2em; /* Tinggi sesuai jumlah baris (1 baris = font-size x line-height) */
                          line-height: 1.8em;
                        }
                    
                        /* Teks penuh (diaktifkan lewat JavaScript) */
                        .text-expand {
                          max-height: none;
                          -webkit-line-clamp: unset;
                        }
                    
                        .read-more-btn {
                          color: #1e78ff;
                          background-color: transparent;
                          border: none;
                          font-size: 14px;
                          cursor: pointer;
                          text-decoration: underline;
                        }
                    </style>
                    <div class="">
                        <div class="row align-items-stretch">
                            @foreach ($data_layanan as $value)
                                <div class="col-lg-3 mb-4">
                                    <div class="box d-flex flex-column" data-aos="zoom-in" data-aos-delay="100">
                                        <div class="card" style="border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                            @if ($value->kategori !== 'normal')
                                                <div class="promo" style="background-color: #FFA500; color: white; font-weight: bold; padding: 5px 10px; border-radius: 5px; position: absolute; top: -10px; left: 15px;">
                                                    {{ $value->kategori }}
                                                </div>
                                            @endif
                                            <div class="card-header text-center px-5" style="background-color: #1e78ff; color: white; border-top-left-radius: 10px; border-top-right-radius: 10px; padding: 15px;">
                                                <h3 class="text-white fw-bold py-3">{{ $value->nama_paket }}</h3>
                                                <h5 class="text-white">Rp {{ number_format($value->harga, 0, ',', '.') }}</h5>
                                                <h6 class="text-primary fw-bold border rounded-pill py-1 px-2 text-primary bg-white">{{ $value->kecepatan }} Mbps</h6>
                                            </div>
                                            <div class="card-body text-center" style="background-color: white; color: black;">
                                                <ul style="list-style-type: none;" class="p-0">
                                                    <li>
                                                        <div class="d-flex">
                                                            <p style="font-size: 14px" class="text-dark fw-bold text-decoration-underline">Benefit</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <p style="font-size: 14px">Internet</p>
                                                            <p style="font-size: 14px" class="text-dark fw-bold">Unlimited</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <p style="font-size: 14px">Biaya pemasangan</p>
                                                            <p style="font-size: 14px" class="text-dark fw-bold">Gratis</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <p style="font-size: 14px">Include</p>
                                                            <p style="font-size: 14px" class="text-dark fw-bold">ONT/Modem</p>
                                                        </div>
                                                    </li>
                                                    <li id="textContent{{ $value->id }}" class="text-limit p-0 text-left d-flex" style="justify-content: flex-start; align-items: flex-start;">
                                                        {{ $value->deskripsi }}
                                                    </li>
                                                                                                                                                         
                                                    <button id="readMoreBtn{{ $value->id }}" class="read-more-btn text-decoration-none p-0">Selengkapnya</button>
                                                </ul>
                                                <div class="d-flex flex-column gap-2 mt-auto p-3">
                                                    <a href="{{ route('checkout.index', $value->id) }}" class="btn" 
                                                       style="background-color: #1e78ff; color: white; border-radius: 5px; text-decoration: none; padding: 8px 12px; font-size: 14px; transition: background-color 0.3s, transform 0.2s;" 
                                                       onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';" 
                                                       onmouseout="this.style.backgroundColor='#1e78ff'; this.style.transform='scale(1)';">
                                                        Beli
                                                    </a>
                                                    <a href="#" class="btn" 
                                                       style="background-color: #ffffff; color: #1e78ff; border: 1px solid #1e78ff; border-radius: 5px; text-decoration: none; padding: 8px 12px; font-size: 14px; transition: background-color 0.3s, color 0.3s, transform 0.2s;" 
                                                       onmouseover="this.style.backgroundColor='#1e78ff'; this.style.color='#ffffff'; this.style.transform='scale(1.05)';" 
                                                       onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='#1e78ff'; this.style.transform='scale(1)';">
                                                        Chat Sales
                                                    </a>
                                                </div>
                                            </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
      // Menambahkan event listener untuk setiap tombol "Selengkapnya"
      document.querySelectorAll('.read-more-btn').forEach(button => {
          button.addEventListener('click', function () {
              // Ambil ID dinamis dari tombol yang diklik
              const id = this.id.replace('readMoreBtn', '');

              // Ambil elemen terkait dengan ID yang sesuai
              const textContent = document.getElementById('textContent' + id);

              // Toggle antara mode terbatas dan diperluas
              if (textContent.classList.contains('text-expand')) {
                  textContent.classList.remove('text-expand');
                  this.textContent = 'Selengkapnya';
              } else {
                  textContent.classList.add('text-expand');
                  this.textContent = 'Tutup';
              }
          });
      });
    });
</script>
@endsection
