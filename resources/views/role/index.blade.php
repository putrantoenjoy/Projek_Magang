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
            <div class="card">
                <div class="d-flex flex-column px-3 pt-3">
                    <div class="border-bottom  pb-3">
                        <h4>Tabel Role</h4>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-circle border-white text-white fs-6"></i> Menambah Role</button>
                                <button class="btn btn-success mx-3"><i class="bi bi-download border-white text-white fs-6"></i> Export PDF</button>
                            </div>
                            <div class="d-flex">
                                <input type="text" class="form-control mx-3" placeholder="cari">
                                <button class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped px-3" id="table">
                    <thead class="fw-bold">
                        <td>Role Id</td>
                        <td>Role</td>
                        <td>Permission</td>
                        <td>Aksi</td>
                    </thead>
                    <tbody>
                        @foreach ($alldata as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td><button class="btn btn-primary">Permission</button></td>
                            <td>
                                <button type="button" id="edit" data-data='{{ json_encode($data) }}' data-bs-toggle="modal" data-bs-target="#EditstaticBackdrop" class="btn btn-primary">Ubah</a>
                                <button type="button" id="delete" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('role.create')
    @include('role.edit')
    <script>
        $('#table').on('click', 'tr #edit', function() {
            let data = $(this).data('data');
            console.log(data);

            // $('#nama_edit').val(data.nama);
            // $('#jabatan_edit').val(data.jabatan);
        })  
    </script>
@endsection