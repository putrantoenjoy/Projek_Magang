<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form-edit" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tim Kerja</h5>
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
                                                <label for="nama_edit" class="form-label">Nama</label>
                                                <input id="nama_edit" type="text" name="nama" required placeholder="Nama" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="jabatan_edit" class="form-label">Jabatan</label>
                                                <input id="jabatan_edit" type="text" name="jabatan" required placeholder="Jabatan" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="file" class="form-label">Pilih Gambar</label>
                                                <input type="file" class="form-control" id="file_edit" name="file">
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
    document.getElementById('_dm-inputtanggal').valueAsDate = new Date();

    function resetForm() {
        document.getElementById("tim-tambah").reset();
    }

    function submitForm() {
        document.getElementById("tim-tambah").submit();
    }
</script>
