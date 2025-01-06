@extends('layouts.master')
@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Transaksi Internet</p>
            <h3 class="text-white" class="fw-bold">Data Transaksi Internet</h3>
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
                            <h5 class="card-title mb-3">Tabel Transaksi Internet</h5>
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
                                            <th>Transaksi ID</th>
                                            <th>Paket Layanan</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            {{-- @canany(['tim-update', 'tim-delete']) --}}
                                                {{-- <th>Aksi</th> --}}
                                            {{-- @endcanany --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_pembayaran as $row => $value)
                                        <tr class="align-middle">
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $value->transaksi_id }}</td>
                                            <td>{{ $value->transaksi->layanan_internet->nama_paket }}</td>
                                            <td>{{ $value->tanggal_pembayaran }}</td>
                                            <td>{{ $value->total_bayar }}</td>
                                            <td>{{ $value->status_pembayaran }}</td>
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