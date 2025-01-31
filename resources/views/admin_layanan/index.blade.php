@extends('layouts.master')
@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Layanan Internet</p>
            <h3 class="text-white" class="fw-bold">Data Layanan Internet</h3>
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
                            <h5 class="card-title mb-3">Tabel Layanan Internet</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex gap-1 align-items-center mb-3">
                                    @can('tim-create')
                                        <button type="button" class="btn btn-primary hstack gap-2 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="demo-psi-add fs-5"></i>
                                            <span class="vr"></span>
                                            Menambah Layanan Internet
                                        </button>
                                    @endcan
                                </div>
                                <div class="col-md-6 d-flex gap-1 align-items-center justify-content-md-end mb-3">
                                    <form action="" method="get" class="d-flex gap-2">
                                        <div class="form-group">
                                            <input type="text" placeholder="Cari..." name="cari" class="form-control" autocomplete="off" value="{{ '$cari' }}">
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
                                            <th>Nama Paket</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Kecepatan</th>
                                            {{-- <th>Deskripsi</th> --}}
                                            <th>Benefit</th>
                                            <th>Masa Aktif</th>
                                            {{-- @canany(['tim-update', 'tim-delete']) --}}
                                                <th>Aksi</th>
                                            {{-- @endcanany --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_layanan as $row => $value)
                                        <tr class="align-middle">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->nama_paket }}</td>
                                            <td>{{ $value->kategori }}</td>
                                            <td>Rp {{ $value->harga }}</td>
                                            <td>{{ $value->kecepatan }} Mbps</td>
                                            {{-- <td>{{ $value->deskripsi }}</td> --}}
                                            <td>{{ 'benefit' }}</td>
                                            <td>{{ $value->masa_aktif }} Hari</td>
                                            {{-- <td><img src="{{ url('storage/img/tim/'. $value->foto) }}" alt="foto" width="50px" height="50px" style="object-fit: cover"></td> --}}
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="{{ route('layanan.hapus', $value->id) }}" class="m-0" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        {{-- @can('tim-update') --}}
                                                            <button class="btn btn-primary" type="button" id="btn-edit" data-data='{{ json_encode($value) }}' data-bs-toggle="modal" data-bs-target="#ModalEdit">Ubah</button>
                                                        {{-- @endcan --}}
                                                        {{-- @can('tim-delete') --}}
                                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                                        {{-- @endcan --}}
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- {{$data->links()}} --}}
                        </div>
                    </div>
                    
                </div>
            </div>
        @include('admin_layanan.modal_tambah')
        @include('admin_layanan.modal_edit')
        
    </div>
</div>

<script>
    $('#table').on('click', 'tr #btn-edit', function() {
        let data = $(this).data('data');
        // console.log(data);
        let updateUrl = '{{ route('layanan.update', ':id') }}'.replace(':id', data.id);
        $('#layanan-ubah').attr('action', updateUrl);
        //  console.log();
         
        $('#nama_paket').val(data.nama_paket);
        $('#kecepatan').val(data.kecepatan);
        $('#kategori').val(data.kategori);
        $('#deskripsi').val(data.deskripsi);
        $('#harga').val(data.harga);
        $('#benefit_id').val(data.benefit_id);
    })  
</script>
@endsection