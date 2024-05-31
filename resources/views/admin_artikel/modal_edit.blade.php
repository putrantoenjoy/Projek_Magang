<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form-edit" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
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
                                            <div class="mb-3">
                                                <label for="nama-edit" class="form-label">Penulis</label>
                                                <input type="text" class="form-control" disabled id="edit-name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="judul-edit" class="form-label">Judul</label>
                                                <input type="text" name="judul" class="form-control" id="edit-judul">
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi-edit" class="form-label">Deskripsi</label>
                                                <input type="text" name="deskripsi" class="form-control" id="edit-deskripsi">
                                            </div>
                                            <div class="mb-3">
                                                <label for="kategori-edit" class="form-label">Kategori</label>
                                                <select name="kategori" id="edit-kategori" class="form-control">
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="file" class="form-label">Pilih Gambar</label>
                                                <input type="file" class="form-control" id="edit-file" name="file">
                                            </div>
                                            <div class="mb-3">
                                                <label for="konten-edit" class="form-label">Konten</label>
                                                <textarea class="form-control" id="edit-konten" name="konten" rows="5"></textarea>
                                            </div>
                                            <div class="d-flex justify-content-end gap-3">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
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
    
</script>
