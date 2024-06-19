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
                                    <form class="row g-3 justify-content-center" id="event-tambah" method="post" action="{{ route('event.simpan') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="nama" class="form-label">Nama Event</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="tempat" class="form-label">Tempat</label>
                                            <input type="text" class="form-control" id="tempat" name="tempat" required placeholder="Tempat">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required disabled>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                            <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="waktu_akhir" class="form-label">Waktu Akhir</label>
                                            <input type="time" class="form-control" id="waktu_akhir" name="waktu_akhir" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-control" id="status" name="status" required>
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}" {{ old('status') == $status->id ? 'selected' : '' }}>
                                                        {{ $status->status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-end p-3">
                                            <div>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
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
        var startDateInput = document.getElementById('tanggal_mulai');
        var endDateInput = document.getElementById('tanggal_akhir');

        // Mendapatkan tanggal hari ini
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        var currentDate = yyyy + '-' + mm + '-' + dd;

        // Membatasi input tanggal awal hanya untuk tanggal hari ini dan seterusnya
        startDateInput.setAttribute('min', currentDate);

        startDateInput.addEventListener('change', function() {
            endDateInput.value = '';
            endDateInput.disabled = true;
            var startDate = new Date(this.value);
            var endDate = new Date(startDate.getTime());
            
            // Tambahkan 1 hari ke tanggal awal untuk menjadi tanggal minimal di input tanggal akhir
            endDate.setDate(endDate.getDate() + 0);
            
            // Format tanggal akhir menjadi string YYYY-MM-DD
            var formattedEndDate = endDate.toISOString().split('T')[0];
            
            endDateInput.min = formattedEndDate;
            endDateInput.disabled = false; // Aktifkan input tanggal akhir
        });
    });
</script>
