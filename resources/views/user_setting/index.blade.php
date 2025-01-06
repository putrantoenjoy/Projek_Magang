@extends('layouts.master')

@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Checkout</p>
            <h3 class="text-white fw-bold">Ubah Data Diri</h3>
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

                <!-- Form Ubah Data Diri -->
                <div class="card">
                    <div class="card-header">
                        <form method="POST" action="{{ route('datadiri.update') }}">
                            @csrf
                            @method('PUT') <!-- Jika menggunakan metode PUT untuk update data -->
                            <div class="p-3">
                                <!-- Email -->
                                <div class="m-3">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" disabled>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="m-3">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="name" class="form-control" value="{{ auth()->user()->name ?? '' }}">
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="m-3">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="number" id="no_telepon" name="no_telepon" class="form-control" value="{{ auth()->user()->no_telepon ?? '' }}">
                                </div>

                                <!-- Lokasi Pemasangan -->
                                <div class="m-3">
                                    <label for="lokasi_pemasangan">Lokasi Pemasangan</label>
                                    <input type="text" id="lokasi_pemasangan" name="lokasi_pemasangan" class="form-control" value="{{ auth()->user()->lokasi_pemasangan ?? '' }}">
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="m-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
