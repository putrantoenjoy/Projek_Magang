@extends('layouts.master')
@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Artikel</p>
            <h3 class="text-white" class="fw-bold">Data Artikel</h3>
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
                            <h5 class="card-title mb-3">Tabel Artikel</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex gap-1 align-items-center mb-3">
                                    @can('artikel-create')
                                        <button type="button" class="btn btn-primary hstack gap-2 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="demo-psi-add fs-5"></i>
                                            <span class="vr"></span>
                                            Tambah Artikel
                                        </button>
                                    @endcan
                                </div>
                                <div class="col-md-6 d-flex gap-1 align-items-center justify-content-md-end mb-3">
                                    <form action="" method="get" class="d-flex gap-2">
                                        <div class="form-group">
                                            <input type="text" placeholder="Cari..." name="cari" class="form-control" autocomplete="off" value="{{ $cari }}">
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
                                            <th>No</th>
                                            {{-- <th>Post id</th>
                                            <th>User Id</th> --}}
                                            <th>Penulis</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Konten</th>
                                            <th>Tanggal Posting</th>
                                            @canany(['artikel-update', 'artikel-delete'])
                                                <th>Aksi</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $row => $data)
                                        <tr>
                                            <td>{{ ++$row }} </td>
                                            {{-- <td>{{ $data->id }} </td>
                                            <td>{{ $data->user_id }} </td> --}}
                                            <td>{{ $data->user->name }} </td>
                                            <td>{{ $data->judul }} </td>
                                            <td>{{ $data->deskripsi }} </td>
                                            <td>{{ $data->kategori->nama }} </td>
                                            <td><img src="{{ url('storage/img/artikel/'. $data->gambar) }}" alt="gambar" width="50px" height="50px" style="object-fit: cover"></td>
                                            <td><a href="{{ route('artikel-kami.show', $data->id)}}"> Lihat Artikel </a> </td>
                                            <td>{{ $data->created_at }} </td>
                                            <td>
                                                <form action="{{ route('artikel-delete', $data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                    <div class="d-flex gap-1">
                                                        @can('artikel-update')
                                                            <button class="btn btn-primary" type="button" id="btn-edit" data-data='{{ json_encode($data) }}' data-bs-toggle="modal" data-bs-target="#ModalEdit">Ubah</button>
                                                        @endcan
                                                        @can('artikel-delete')
                                                            <button class="btn btn-danger" type="submmit">Hapus</button>
                                                        @endcan
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('admin_artikel.modal_tambah')
        @include('admin_artikel.modal_edit')
        {{-- @include('admin_artikel.delete') --}}
        
    </div>
</div>
{{-- <script type="text/javascript" src="{{ asset('node_modules/froala-editor/js/froala_editor.pkgd.min.js') }}"></script> --}}
<script>
    new FroalaEditor("#konten", {
 
        toolbarButtons: [
             ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'alignLeft', 'alignCenter', 'alignRight', 'alignJustify','textColor', 'backgroundColor', 'formatOLSimple', 'formatUL', 'insertLink','insertImage','insertFile'],
        ]
 
     });
    new FroalaEditor("#edit-konten", {
 
        toolbarButtons: [
             ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'alignLeft', 'alignCenter', 'alignRight', 'alignJustify','textColor', 'backgroundColor', 'formatOLSimple', 'formatUL', 'insertLink','insertImage','insertFile'],
        ]
 
     });
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script> --}}
<script>
    
</script>
<script>
    // var input = document.querySelector('input[name=tags]');
    // new Tagify(input)
</script>
@endsection