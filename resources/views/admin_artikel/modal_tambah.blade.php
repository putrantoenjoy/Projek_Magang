<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section id="tambah_artikel">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="h-100">
                                <div class="card-body">
                                    <form class="row g-3 justify-content-center" id="artikel-tambah" method="post" action="">
                                        
                                        <div class="col-md-12">
                                            <label for="_dm-inputname" class="form-label">Post id</label>
                                            <input id="_dm-inputname" type="text" value="" name="post_id" required class="form-control" disabled>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputjudul" class="form-label">Judul</label>
                                            <input id="_dm-inputjudul" type="text" name="judul" required placeholder="Judul" class="form-control">
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
                                            <label for="_dm-inputpenulis" class="form-label">Penulis</label>
                                            <input id="_dm-inputpenulis" type="text" name="penulis" required class="form-control" placeholder="Penulis">
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputtanggal" class="form-label">Tanggal Post</label>
                                            <input id="_dm-inputtanggal" type="text" name="tanggal post" required class="form-control" placeholder="Tanggal Post">
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-end p-3">
                                    <div>
                                        <button type="reset" onclick="reset_tambah()" class="btn btn-danger">Reset</button>
                                        <button type="submit" onclick="submit_tambah()" class="btn btn-primary">Tambah</button>
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

    function reset_tambah() {
        document.getElementById("artikel-tambah").reset();
    }

    function submit_tambah() {
        document.getElementById("artikel-tambah").submit();
    }
</script>
