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
                    <div class="card">
                        <div class="d-flex flex-column px-3 pt-3">
                            <div class="border-bottom  pb-3">
                                <h4>Tabel User</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <button class="btn btn-primary">Menambah User</button>
                                        <button class="btn btn-success mx-3">Export PDF</button>
                                    </div>
                                    <div class="d-flex">
                                        <input type="text" class="form-control mx-3" placeholder="cari">
                                        <button class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped px-3">
                            <thead class="fw-bold">
                                <td>User Id</td>
                                <td>Nama</td>
                                <td>Role</td>
                                <td>Email</td>
                                <td>Foto</td>
                                <td>Aksi</td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>U00001</td>
                                    <td>khosim</td>
                                    <td>admin</td>
                                    <td>khosim@gmail.com</td>
                                    <td>admin</td>
                                    <td>
                                        <a href="" class="btn btn-primary">Ubah</a>
                                        <a href="" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>U00001</td>
                                    <td>khosim</td>
                                    <td>admin</td>
                                    <td>khosim@gmail.com</td>
                                    <td>admin</td>
                                    <td>
                                        <a href="" class="btn btn-primary">Ubah</a>
                                        <a href="" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>U00001</td>
                                    <td>khosim</td>
                                    <td>admin</td>
                                    <td>khosim@gmail.com</td>
                                    <td>admin</td>
                                    <td>
                                        <a href="" class="btn btn-primary">Ubah</a>
                                        <a href="" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <!-- END - FOOTER -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - CONTENTS -->
        <!-- HEADER -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - HEADER -->
        <!-- MAIN NAVIGATION -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - MAIN NAVIGATION -->
    
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - PAGE CONTAINER -->
    <!-- SCROLL TO TOP BUTTON -->
    
    
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - SCROLL TO TOP BUTTON -->
    <!-- JAVASCRIPTS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- Bootstrap JS [ OPTIONAL ] -->
    @endsection