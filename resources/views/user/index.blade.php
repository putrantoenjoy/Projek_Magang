@extends('layouts.master')
@section ('content')
            <div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
            {{-- @yield('content') --}}
            <div class="container">
                <div class="d-flex flex-column m-3">
                    <div class="card bg-transparent">
                        <p class="text-white fs-5">User</p>
                        <h3 class="text-white" class="fw-bold">Data User</h3>
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
                                    <h5 class="card-title mb-3">Tabel User</h5>
                                    <div class="row">
                                        <div class="col-md-6 d-flex gap-1 align-items-center mb-3">
                                            <button type="button" class="btn btn-primary hstack gap-2 align-self-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="demo-psi-add fs-5"></i>
                                                <span class="vr"></span>
                                                Tambah User
                                            </button>
                                            <a href="{{ route('user-export') }}" class="btn btn-success mx-3 hstack gap-2 align-self-center">
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
                                                    <th>User Id</th>
                                                    <th>Nama</th>
                                                    <th>Role</th>
                                                    <th>Email</th>
                                                    <th>Foto</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($alldata as $data)
                                                    <tr>
                                                        <td>{{ $data->id }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>
                                                            @foreach ($allrole as $role)
                                                                @if ($data->id == $role->id)
                                                                    <label class="badge text-white fw-normal align-items-center bg-secondary">
                                                                        {{ $role->name }}
                                                                    </label>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $data->email }}</td>
                                                        <td>{{ '$data->foto' }}</td>
                                                        <td>
                                                            <a href="" class="btn btn-primary">Ubah</a>
                                                            <a href="" class="btn btn-danger">Hapus</a>
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
        @include('user.create')
        {{-- @include('user.edit') --}}
    @endsection