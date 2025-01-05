@extends('layouts.master')
@section('content')
<div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div>
<div class="container">
    <div class="d-flex flex-column m-3">
        <div class="card bg-transparent">
            <p class="text-white fs-5">Checkout</p>
            <h3 class="text-white fw-bold">Konfirmasi Pembayaran</h3>
        </div>
        <div class="content__boxed">
            <div class="content__wrap">

                <!-- Flash Messages -->
                @if (session('status'))
                    <div class="alert alert-success" id="success">
                        {{ session('status') }}
                    </div>
                @elseif (session('delete'))
                    <div class="alert alert-danger" id="danger">
                        {{ session('delete') }}
                    </div>
                @endif

                <!-- Error Handling -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Error!</strong> {!! implode('', $errors->all('<div>:message</div>')) !!}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <form class="row g-3 justify-content-center" id="footer-ubah" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <h5>Total Tagihan</h5>
                            <div class="col-12">
                                <label for="total_tagihan" class="form-label">Total Tagihan</label>
                                <input id="total_tagihan" type="text" name="total_tagihan" required class="form-control" value="{{ $totalTagihan ?? '' }}" disabled>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-end p-3">
                        <button type="submit" form="footer-ubah" class="btn btn-primary">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var trigger = document.querySelector('[data-bs-toggle="modal"]');
    trigger.addEventListener('click', function () {
        var modal = new bootstrap.Modal(document.getElementById('exampleBayar'));
        modal.show();
    });
});
</script>
@endsection
