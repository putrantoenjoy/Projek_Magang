@extends('layouts.master')
@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Galeri</p>
            <h3 class="text-white" class="fw-bold">Data Galeri</h3>
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
        
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-3">Tabel Galeri</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex gap-1 align-items-center mb-3">
                                    <button type="button" class="btn btn-primary hstack gap-2 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="demo-psi-add fs-5"></i>
                                        <span class="vr"></span>
                                        Tambah Galeri
                                    </button>
                                    <a href="" class="btn btn-success mx-3 hstack gap-2 align-self-center">
                                        <i class="bi bi-download border-white text-white fs-6"></i>
                                        <span class="vr"></span>
                                        Export PDF
                                    </a>
                                </div>
                                <div class="col-md-6 d-flex gap-1 align-items-center justify-content-md-end mb-3">
                                    <form action="" method="get" class="d-flex gap-2">
                                        <div class="form-group">
                                            <input type="text" placeholder="Cari..." name="cari" class="form-control" autocomplete="off" value="">
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Post id</th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th>Tag</th>
                                            <th>Tanggal Post</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($allData as $row => $data) --}}
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td>
                                                <div class="d-flex">
                                                    {{-- @if($data->deleted_at == null) --}}
                                                    <form action="" method="post">
                                                        @csrf
                                                        @method('delete')    
                                                        <button class="btn btn-primary" type="button" id="btn-edit" data-data='' data-bs-toggle="modal" data-bs-target="#ModalEdit"><i class="bi bi-pencil fs-5"></i></button>
                                                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash fs-5"></i></button>
                                                    </form>
                                                    {{-- @else --}}
                                                    <form action="" method="post">
                                                        @csrf
                                                        {{-- <button class="btn btn-danger disabled" type="button">Deleted</button> --}}
                                                    </form>
                                                    {{-- @endif --}}
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                            {{-- {{$allData->onEachSide(2)->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        @include('admin_galeri.modal_tambah')
        @include('admin_galeri.modal_edit')
        
    </div>
</div>

@endsection