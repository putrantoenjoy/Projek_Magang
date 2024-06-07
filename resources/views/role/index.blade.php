@extends('layouts.master')
@section ('content')
    <div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
    {{-- @yield('content') --}}
    <div class="container">
        <div class="d-flex flex-column m-3">
            <div class="card bg-transparent">
                <p class="text-white fs-5">Role</p>
                <h3 class="text-white" class="fw-bold">Data Role</h3>
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
                            <h5 class="card-title mb-3">Tabel Role</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex gap-2 align-items-center mb-3">
                                    @can('role-create')
                                        <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="demo-psi-add fs-5"></i>
                                            <span class="vr"></span>
                                            Tambah Role
                                        </button>
                                    @endcan
                                    <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addPermissionStaticBackdrop">
                                        <i class="demo-psi-add fs-5"></i>
                                        <span class="vr"></span>
                                        Tambah Permission
                                    </button>
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
                                            <th>Role</th>
                                            @canany(['role-update', 'role-delete'])
                                                <th>Aksi</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alldata as $row => $data)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $data->name }}</td>
                                            {{-- <td><button class="btn btn-primary" type="button" id="show" data-data='{{ json_encode($data) }}' data-bs-toggle="modal" data-bs-target="#ShowstaticBackdrop">Lihat Permission</button></td> --}}
                                            <td>
                                                <form action="{{ route('role-delete', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    @can('role-update')
                                                        <button class="btn btn-primary" type="button" id="edit" data-data='{{ json_encode($data) }}' data-bs-toggle="modal" data-bs-target="#EditstaticBackdrop">Ubah</button>
                                                    @endcan
                                                    @can('role-delete')
                                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                                    @endcan
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
        </div>
    </div>
    @include('role.create')
    @include('role.permission')
    @include('role.edit')
    @include('role.show')
    <script>
        // $('#table').on('click', 'tr #edit', function() {
        //     let data = $(this).data('data');
        //     console.log(data);
        // })  
    </script>
@endsection