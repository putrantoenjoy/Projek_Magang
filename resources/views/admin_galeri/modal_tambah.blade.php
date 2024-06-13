<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Galeri</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section id="tambah_galeri">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="h-100">
                                <div class="card-body">
                                    <form class="row g-3 justify-content-center" id="galeri-tambah" method="post" action="{{ url('galeri') }}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- <div class="col-md-12">
                                            <label for="_dm-inputname" class="form-label">Post id</label>
                                            <input id="_dm-inputname" type="text" value="" name="post_id" required class="form-control" disabled>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <label for="file" class="form-label">Pilih Gambar</label>
                                            <input type="file" class="form-control" id="file" name="file" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputjudul" class="form-label">Judul</label>
                                            <input id="_dm-inputjudul" type="text" name="judul" required placeholder="Judul" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label for="kategori" class="form-label">Kategori</label>
                                            <select id="Kategori_edit" name="kategori" class="form-select">
                                                @foreach (['proyek', 'acara', 'produk', 'sertifikat', 'fasilitas', 'klien', 'kegiatan_sosial'] as $kategori)
                                                    <option value="{{ $kategori }}" {{ old('kategori') == $kategori ? 'selected' : '' }}>
                                                        {{ ucwords(str_replace('_', ' ', $kategori)) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">Deskripsi</label>
                                            <input id="_dm-inputdeskripsi" type="text" name="deskripsi" required class="form-control" placeholder="Deskripsi">
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputtanggal" class="form-label">Tanggal Post</label>
                                            <input id="_dm-inputtanggal" type="text" name="tanggal_post" required class="form-control" placeholder="Tanggal Post" readonly>
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
    document.addEventListener('DOMContentLoaded', function() {
        setTodayDate();
    });

    function setTodayDate() {
        var today = new Date();
        var options = { day: '2-digit', month: 'long', year: 'numeric' };
        var formattedDate = today.toLocaleDateString('id-ID', options);
        document.getElementById('_dm-inputtanggal').value = formattedDate;
    }

    function reset_tambah() {
        document.getElementById("galeri-tambah").reset();
        setTodayDate();
    }

    function submit_tambah() {
        document.getElementById("galeri-tambah").submit();
    }
</script>
