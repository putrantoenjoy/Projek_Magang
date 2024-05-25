<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section id="tambah_event">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="h-100">
                                <div class="card-body">
                                    <form class="row g-3 justify-content-center" id="event-tambah" method="post" action="{{ url('event') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="_dm-inputtempat" class="form-label">Tempat Event</label>
                                            <input id="_dm-inputtempat" type="text" name="tempat" required placeholder="Tempat" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="_dm-inputtanggal" class="form-label">Tanggal Event</label>
                                            <input id="_dm-inputtanggal" type="date" name="tanggal" required placeholder="Tanggal" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="_dm-inputwaktu" class="form-label">Waktu Event</label>
                                            <input id="_dm-inputwaktu" type="time" name="waktu" required placeholder="Waktu" class="form-control">
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
        document.getElementById("event-tambah").reset();
    }

    function submit_tambah() {
        document.getElementById("event-tambah").submit();
    }
</script>
