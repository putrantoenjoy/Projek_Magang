<div class="modal fade" id="exampleBayar" tabindex="-1" aria-labelledby="exampleBayarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleBayarLabel">Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section id="tambah_galeri">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="h-100">
                                <div class="card-body">
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
                                    <button type="reset" form="footer-ubah" class="btn btn-danger">Reset</button>
                                    <button type="submit" form="footer-ubah" class="btn btn-primary">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
