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
                                    @can('galeri-create')
                                        <button type="button" class="btn btn-primary hstack gap-2 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="demo-psi-add fs-5"></i>
                                            <span class="vr"></span>
                                            Tambah Galeri
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
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Post</th>
                                            @canany(['galeri-update', 'galeri-delete'])
                                                <th>Aksi</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row => $value)
                                        <tr class="align-middle">
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('storage/img/galeri/'.$value->gambar) }}" alt="gambar" width="50px" height="50px" style="object-fit: cover"></td>
                                            <td>{{ $value->judul }}</td>
                                            <td>{{ ucwords(str_replace('_', ' ', $value->kategori)) }}</td>
                                            <td>{{ $value->deskripsi }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="{{ url('galeri/'. $value->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        @can('galeri-update')
                                                            <button class="btn btn-primary" type="button" id="btn-edit" data-data='{{ json_encode($value) }}' data-bs-toggle="modal" data-bs-target="#ModalEdit">Ubah</button>
                                                        @endcan
                                                        @can('galeri-delete')
                                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                                        @endcan
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="d-flex justify-content-center"> --}}
                                {{$data->links()}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @include('admin_galeri.modal_tambah')
        @include('admin_galeri.modal_edit')
        
    </div>
</div>

<script>
    $('#table').on('click', 'tr #btn-edit', function() {
        let data = $(this).data('data');
        $('#form-edit').attr('action', "{{ url('galeri') }}" + '/' + data.id)
        // $('#post_edit').val(data.post_id);
        $('#judul_edit').val(data.judul);
        $('#Kategori_edit').val(data.kategori);
        $('#deskripsi_edit').val(data.deskripsi);
        $('#tanggal_edit').val(data.tanggal_post);
    })  
</script>
@endsection