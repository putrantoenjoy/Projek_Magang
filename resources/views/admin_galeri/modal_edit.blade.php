<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form-edit" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section id="edit_galeri">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="h-100">
                                    <div class="card-body">
                                        <div class="row g-3 justify-content-center">
                                            @csrf
                                            @method('PUT')
                                            {{-- <div class="col-md-12">
                                                <label for="post_edit" class="form-label">Post ID</label>
                                                <input id="post_edit" type="text" value="" name="post_id" required class="form-control" disabled>
                                            </div> --}}
                                            <div class="col-md-12">
                                                <label for="file" class="form-label">Pilih Gambar</label>
                                                <input type="file" class="form-control" id="file" name="file">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="judul_edit" class="form-label">Judul</label>
                                                <input id="judul_edit" type="text" name="judul" required placeholder="Judul" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <label for="Kategori_edit" class="form-label">Kategori</label>
                                                <select id="Kategori_edit" name="kategori" class="form-select">
                                                    @foreach (['proyek', 'acara', 'produk', 'sertifikat', 'fasilitas', 'klien', 'kegiatan_sosial'] as $kategori)
                                                        <option value="{{ $kategori }}" {{ old('kategori') == $kategori ? 'selected' : '' }}>
                                                            {{ ucwords(str_replace('_', ' ', $kategori)) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="deskripsi_edit" class="form-label">Deskripsi</label>
                                                <input id="deskripsi_edit" type="text" name="deskripsi" required placeholder="Deskripsi" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <label for="tanggal_edit" class="form-label">Tanggal Post</label>
                                                <input id="tanggal_edit" type="date" name="tanggal_post" class="form-control">
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
    document.getElementById('tanggal_edit').valueAsDate = new Date();

    function resetForm() {
        document.getElementById("galeri-tambah").reset();
    }

    function submitForm() {
        document.getElementById("galeri-tambah").submit();
    }
</script>
