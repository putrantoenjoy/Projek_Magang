@extends('layouts.master')
@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Checkout</p>
            <h3 class="text-white fw-bold">Konfirmasi Data Diri</h3>
        </div>
        <div class="content__boxed">
            <div class="content__wrap">

                <!-- Flash Messages -->
                @if (session('status'))
                    <div class="alert alert-success" id="success">
                        {{ session('status') }}
                    </div>
                @elseif (session('delete'))
                    <div class="alert alert-danger" id="danger">
                        {{ session('delete') }}
                    </div>
                @endif

                <!-- Error Handling -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Error!</strong> {!! implode('', $errors->all('<div>:message</div>')) !!}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <!-- Data Diri -->
                        <div class="p-3">
                            <div class="m-3">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" class="form-control" value="{{ auth()->user()->name ?? '' }}" disabled>
                            </div>
                            <div class="m-3">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" id="nomor_telepon" class="form-control" value="{{ auth()->user()->no_telepon ?? '' }}" disabled>
                            </div>
                            <div class="m-3">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" disabled>
                            </div>
                            <div class="m-3">
                                <label for="lokasi_pemasangan">Lokasi Pemasangan</label>
                                <input type="text" id="lokasi_pemasangan" class="form-control" value="{{ auth()->user()->lokasi_pemasangan ?? '' }}" disabled>
                            </div>
                            <div class="m-3 d-flex justify-content-center">
                                <a href="{{ route('transaksi.pengaturan', ['id' => $id]) }}" class="btn btn-primary">Ubah Data Diri</a>
                            </div>
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="p-3">
                            <div class="m-3">
                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                                    <option value="BCA">BCA</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="BSI">BSI</option>
                                </select>
                            </div>
                            <div class="m-3 d-flex justify-content-end">
                                <a href="{{ route('pembayaran.index', $id) }}" class="btn btn-primary">Lanjutkan</a>
                            </div>
                        </div>
                    </div>
                    {{-- @include('transaksi.bayar') --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var trigger = document.querySelector('[data-bs-toggle="modal"]');
    trigger.addEventListener('click', function () {
        var modal = new bootstrap.Modal(document.getElementById('exampleBayar'));
        modal.show();
    });
});
</script>
@endsection
