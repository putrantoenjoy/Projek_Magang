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
                                    <form method="POST" > 
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Author</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled id="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Judul</label>
                                            <input type="text" class="form-control" id="subject">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="request" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="request" rows="5"></textarea>
                                        </div>
        
                                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        
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

