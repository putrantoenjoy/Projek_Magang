<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="layanan-ubah" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Layanan Internet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section id="edit_tim">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="h-100">
                                    <div class="card-body">
                                        <div class="row g-3 justify-content-center">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-md-12">
                                                <label for="_dm-inputnama" class="form-label">Nama Paket</label>
                                                <input id="nama_paket" type="text" name="nama_paket" required placeholder="Nama" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="_dm-inputnama" class="form-label">Kategori</label>
                                                <select name="kategori" id="kategori" class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="normal">Normal</option>
                                                    <option value="promo">Promo</option>
                                                    <option value="rekomendasi">Rekomendasi</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="_dm-inputnama" class="form-label">Harga</label>
                                                <input id="harga" type="text" name="harga" required placeholder="Harga" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="_dm-inputnama" class="form-label">Kecepatan</label>
                                                <input id="kecepatan" type="text" name="kecepatan" required placeholder="Nama" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="_dm-inputnama" class="form-label">Benefit</label>
                                                <select name="benefit_id" id="benefit_id" class="form-control">
                                                    <option value="">Pilih</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="_dm-inputnama" class="form-label">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" cols="30" class="form-control" rows="10"></textarea>
                                                {{-- <input id="_dm-inputnama" type="text" name="deskripsi" required placeholder="Nama" class="form-control"> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end p-3">
                                        <div>
                                            <button type="button" class="btn btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // document.getElementById('_dm-inputtanggal').valueAsDate = new Date();

    function resetForm() {
        document.getElementById("layanan-ubah").reset();
    }

    function submitForm() {
        document.getElementById("layanan-ubah").submit();
    }
    
</script>
