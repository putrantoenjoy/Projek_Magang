@extends('layouts.user_master')
@section('content')
   <!-- ======= Pricing Section ======= -->
   <section id="pricing" class="pricing" style="padding-top: 100px;">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Layanan</h2>
        <p>Layanan Kami</p>
      </div>
      <div class="row p-0">
        <div class="col-md-4">
          <h3>Pilihan Layanan</h3>
          <form action="{{ url()->current() }}" method="get">
              <div class="input-group gap-2">
                  <select id="filter" name="filter" class="form-control">
                      <option value="" {{ request('filter') == '' ? 'selected' : '' }}>-- Semua Kategori --</option>
                      <option value="normal" {{ request('filter') == 'normal' ? 'selected' : '' }}>Paket Standar</option>
                      <option value="promo" {{ request('filter') == 'promo' ? 'selected' : '' }}>Promo</option>
                      <option value="spesial" {{ request('filter') == 'spesial' ? 'selected' : '' }}>Paket Spesial</option>
                      <option value="gaming" {{ request('filter') == 'gaming' ? 'selected' : '' }}>Paket Gaming</option>
                  </select>
                  <div class="input-group-append">
                      <button type="submit" class="btn btn-primary">Terapkan</button>
                  </div>
              </div>
          </form>
        </div>        
      </div>
      {{-- tag selengkapnya --}}
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

      <div class="row align-items-stretch">
        <!-- get Data -->
        @foreach ($data_layanan as $value)
        <div class="col-lg-3">
          <div class="box d-flex p-0 flex-column" data-aos="zoom-in" data-aos-delay="100">
            <div class="card" style="border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
              @if ($value->kategori == 'normal')
              @else
              <div class="promo" style="background-color: #FFA500; color: white; font-weight: bold; padding: 5px 10px; border-radius: 5px; position: absolute; top: -10px; left: 15px;">{{ $value->kategori }}</div>
              @endif
              <div class="card-header text-center px-5" style="background-color: #1e78ff; color: white; border-top-left-radius: 10px; border-top-right-radius: 10px; padding: 15px;">
                <h3 class="fw-bold py-3">{{ $value->nama_paket }}</h3>
                <h5>Rp {{ number_format($value->harga, 0, ',', '.') }}</h5>
                <h6 class="fw-bold border rounded-pill py-1 px-2 text-primary bg-white">{{ $value->kecepatan }} Mbps</h6>
              </div>
              <div class="card-body text-center" style="background-color: white; color: black;">
                <ul>
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
                  <li id="textContent{{ $value->id }}" class="text-limit p-0">{{ $value->deskripsi }}</li>
                  <button id="readMoreBtn{{ $value->id }}" class="read-more-btn text-decoration-none p-0">Selengkapnya</button>
                </ul>
                <div class="d-flex flex-column gap-2 mt-auto p-3">
                  <!-- Tombol Beli -->
                  <a href="{{ route('checkout.index', $value->id) }}" class="btn" 
                     style="background-color: #1e78ff; color: white; border-radius: 5px; text-decoration: none; padding: 8px 12px; font-size: 14px; transition: background-color 0.3s, transform 0.2s;" 
                     onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';" 
                     onmouseout="this.style.backgroundColor='#1e78ff'; this.style.transform='scale(1)';">
                    Beli
                  </a>
                
                  <!-- Tombol Chat Sales -->
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
  </section>
  <!-- End Pricing Section -->
@endsection
