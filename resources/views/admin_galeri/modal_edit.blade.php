<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section id="tambah_galeri">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="h-100">
                                <div class="card-body">
                                    <form class="row g-3 justify-content-center" id="galeri-tambah" method="post" action="" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-12">
                                            <label for="_dm-inputname" class="form-label">Post ID</label>
                                            <input id="_dm-inputname" type="text" value="" name="post_id" required class="form-control" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="file" class="form-label">Pilih Gambar</label>
                                            <input type="file" class="form-control" id="file" name="file">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputjudul" class="form-label">Judul</label>
                                            <input id="_dm-inputjudul" type="text" name="judul" required placeholder="Judul" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">Deskripsi</label>
                                            <textarea id="_dm-inputdeskripsi" name="deskripsi" required class="form-control" placeholder="Deskripsi" rows="4"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputKategori" class="form-label">Kategori</label>
                                            <select id="_dm-inputKategori" name="kategori" class="form-select" required>
                                                <option value="" selected disabled>Pilih Kategori</option>
                                                {{-- <?php foreach ($kategori as $kat) { ?>
                                                    <option value="<?php echo $kat; ?>"><?php echo $kat; ?></option>
                                                <?php } ?> --}}
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputtags" class="form-label">Tags</label>
                                            <select id="_dm-inputtags" name="tags[]" required class="form-control" multiple>
                                                {{-- <?php foreach ($tags as $tag) { ?>
                                                    <option value="<?php echo $tag; ?>"><?php echo $tag; ?></option>
                                                <?php } ?> --}}
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputtanggal" class="form-label">Tanggal Post</label>
                                            <input id="_dm-inputtanggal" type="date" name="tanggal_post" required class="form-control">
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-end p-3">
                                    <div>
                                        <button type="button" onclick="resetForm()" class="btn btn-danger">Reset</button>
                                        <button type="submit" onclick="submitForm()" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('_dm-inputtanggal').valueAsDate = new Date();

    function resetForm() {
        document.getElementById("galeri-tambah").reset();
    }

    function submitForm() {
        document.getElementById("galeri-tambah").submit();
    }
</script>
