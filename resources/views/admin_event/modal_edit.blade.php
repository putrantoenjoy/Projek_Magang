<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form-edit" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section id="edit_event">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="h-100">
                                    <div class="card-body">
                                        <div class="row g-3 justify-content-center">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-md-12">
                                                <label for="tempat_edit" class="form-label">Tempat</label>
                                                <input id="tempat_edit" type="text" name="tempat" required placeholder="Tempat" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="tanggal_edit" class="form-label">Tanggal</label>
                                                <input id="tanggal_edit" type="date" name="tanggal" required placeholder="Tanggal" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="waktu_edit" class="form-label">Waktu</label>
                                                <input id="waktu_edit" type="time" name="waktu" required placeholder="Waktu" class="form-control">
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
        document.getElementById("event-tambah").reset();
    }

    function submitForm() {
        document.getElementById("event-tambah").submit();
    }
</script>
