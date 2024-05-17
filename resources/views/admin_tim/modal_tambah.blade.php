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
                                    <form class="row g-3 justify-content-center" id="tim-tambah" method="post" action="{{ url('tim') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="_dm-inputnama" class="form-label">Nama</label>
                                            <input id="_dm-inputnama" type="text" name="nama" required placeholder="Nama" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputjabatan" class="form-label">Jabatan</label>
                                            <input id="_dm-inputjabatan" type="text" name="jabatan" required placeholder="Jabatan" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="file" class="form-label">Pilih Gambar</label>
                                            <input type="file" class="form-control" id="file" name="file" required>
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
        document.getElementById("tim-tambah").reset();
    }

    function submit_tambah() {
        document.getElementById("tim-tambah").submit();
    }
</script>
