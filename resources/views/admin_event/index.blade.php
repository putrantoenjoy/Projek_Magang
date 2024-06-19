@extends('layouts.master')
@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Event</p>
            <h3 class="text-white" class="fw-bold">Data Event</h3>
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
                            <h5 class="card-title mb-3">Tabel Event</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex gap-1 align-items-center mb-3">
                                    @can('event-create')
                                        <button type="button" class="btn btn-primary hstack gap-2 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="demo-psi-add fs-5"></i>
                                            <span class="vr"></span>
                                            Tambah Event
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
                                            <th>Nama Event</th>
                                            <th>Tempat Event</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                            @canany(['event-update', 'event-delete'])
                                                <th>Aksi</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row => $value)
                                        <tr class="align-middle">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->nama }}</td>
                                            <td>{{ $value->tempat }}</td>
                                            <td>{{ \Carbon\Carbon::parse($value->tanggal_mulai)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($value->tanggal_akhir)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($value->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($value->waktu_akhir)->format('H:i') }}</td>
                                            <td>{{ $value->eventstatus->status }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="{{ route('event.hapus', $value->id) }}" method="post" class="m-0">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="d-flex gap-1">
                                                            @can('event-update')
                                                            <button class="btn btn-primary" type="button" id="btn-edit" data-data='{{ json_encode($value) }}' data-bs-toggle="modal" data-bs-target="#ModalEdit">Ubah</button>
                                                            @endcan
                                                            @can('event-delete')
                                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                                            @endcan
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$data->links()}}
                        </div>
                    </div>
                </div>
            </div>
        @include('admin_event.modal_tambah')
        @include('admin_event.modal_edit')
        
    </div>
</div>

<script>
    $('#table').on('click', 'tr #btn-edit', function() {
        let data = $(this).data('data');
        $('#form-edit').attr('action', "{{ url('event') }}" + '/' + data.id);
        $('#nama_edit').val(data.nama);
        $('#tempat_edit').val(data.tempat);
        $('#tanggal_mulai_edit').val(data.tanggal_mulai);
        $('#tanggal_akhir_edit').val(data.tanggal_akhir);
        $('#waktu_mulai_edit').val(data.waktu_mulai);
        $('#waktu_akhir_edit').val(data.waktu_akhir);
        $('#status_edit').val(data.status);
    })
</script>
@endsection