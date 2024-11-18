<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mengubah Footer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section id="tambah_galeri">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="h-100">
                                <div class="card-body">
                                    <form class="row g-3 justify-content-center" id="footer-ubah" method="post" action="{{ route('pengaturan-update', 1) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <h5>Informasi Umum Website</h5>
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">Nama Website</label>
                                            <input id="_dm-inputdeskripsi" type="text" name="nama_website" required class="form-control" value="{{ $footer->nama_website }}" placeholder="Nama Website">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">Alamat</label>
                                            <input id="_dm-inputdeskripsi" type="text" name="alamat" required class="form-control" placeholder="Alamat" value="{{ $footer->alamat }}">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">Phone</label>
                                            <input id="_dm-inputdeskripsi" type="text" name="telepon" required class="form-control" placeholder="Phone" value="{{ $footer->telepon }}">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">Email</label>
                                            <input id="_dm-inputdeskripsi" type="text" name="email" required class="form-control" placeholder="Email" value="{{ $footer->email }}">
                                        </div>
                                        <h5>Media Sosial Website</h5>
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">Facebook</label>
                                            <input id="_dm-inputdeskripsi" type="text" name="facebook_link" required class="form-control" placeholder="https://www.facebook.com/..." value="{{ $footer->facebook_link }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">Instagram</label>
                                            <input id="_dm-inputdeskripsi" type="text" name="instagram_link" required class="form-control" placeholder="https://www.instagram.com/..." value="{{ $footer->instagram_link }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">Youtube</label>
                                            <input id="_dm-inputdeskripsi" type="text" name="youtube_link" required class="form-control" placeholder="https://www.youtube.com/..." value="{{ $footer->youtube_link }}">
                                        </div>
                                        <div class="col-12">
                                            <label for="_dm-inputdeskripsi" class="form-label">WhatsApp</label>
                                            <input id="_dm-inputdeskripsi" type="text" name="whatsapp_link" required class="form-control" placeholder="https://www.whatsapp.com/..." value="{{ $footer->whatsapp_link }}">
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="d-flex justify-content-end p-3">
                                    <div>
                                        <button type="reset" onclick="reset_ubah()" class="btn btn-danger">Reset</button>
                                        <button type="submit" onclick="submit_ubah()" class="btn btn-primary">Ubah</button>
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
    // document.addEventListener('DOMContentLoaded', function() {
    //     setTodayDate();
    // });

    // function setTodayDate() {
    //     var today = new Date();
    //     var options = { day: '2-digit', month: 'long', year: 'numeric' };
    //     var formattedDate = today.toLocaleDateString('id-ID', options);
    //     document.getElementById('_dm-inputtanggal').value = formattedDate;
    // }

    function reset_ubah() {
        document.getElementById("footer-ubah").reset();
        setTodayDate();
    }

    function submit_ubah() {
        document.getElementById("footer-ubah").submit();
    }
</script>
