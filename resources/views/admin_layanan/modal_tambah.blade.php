<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Tim Kerja</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section id="tambah_tim">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="h-100">
                                <div class="card-body">
                                    <form class="row g-3 justify-content-center" id="layanan-tambah" method="post" action="{{ route('layanan.simpan') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="_dm-inputnama" class="form-label">Nama Paket</label>
                                            <input id="_dm-inputnama" type="text" name="nama_paket" required placeholder="Nama Paket" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputnama" class="form-label">Kategori</label>
                                            <select name="kategori" id="" class="form-control">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="promo">Promo</option>
                                                <option value="rekomendasi">Rekomendasi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputnama" class="form-label">Harga</label>
                                            <input id="_dm-inputnama" type="text" name="harga" required placeholder="Harga" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputnama" class="form-label">Kecepatan</label>
                                            <input id="_dm-inputnama" type="text" name="kecepatan" required placeholder="Kecepatan" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputnama" class="form-label">Benefit</label>
                                            <select name="benefit_id" id="" class="form-control">
                                                <option value="">Pilih</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputnama" class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" id="" cols="30" class="form-control" rows="10"></textarea>
                                            {{-- <input id="_dm-inputnama" type="text" name="deskripsi" required placeholder="Nama" class="form-control"> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputnama" class="form-label">Masa Aktif (hari)</label>
                                            <input id="_dm-inputnama" type="text" name="masa_aktif" required placeholder="Masa Aktif" class="form-control">
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
    function reset_tambah() {
        document.getElementById("layanan-tambah").reset();
    }

    function submit_tambah() {
        document.getElementById("layanan-tambah").submit();
    }
</script>

