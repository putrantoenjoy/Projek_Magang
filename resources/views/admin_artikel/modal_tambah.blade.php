<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                                    <form class="row g-3 justify-content-center" id="event-tambah" method="post" action="{{ route('artikel-create') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Penulis</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled id="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" name="judul" class="form-control" id="judul">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori</label>
                                            <select name="kategori" id="kategori" class="form-control">
                                                @foreach ($kategori as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="file" class="form-label">Pilih Gambar</label>
                                            <input type="file" class="form-control" id="file" name="file">
                                        </div>
                                        <div class="mb-3">
                                            <label for="konten" class="form-label">Konten</label>
                                            <textarea class="form-control" id="konten" name="konten" rows="5"></textarea>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="tags" class="form-label">Tags</label>
                                            <input type="text" class="form-control" name="tags" id="tags">
                                        </div> --}}
                                        {{-- <div class="mb-3">
                                            <label for="facebook" class="form-label">Link Facebook (opsional)</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="facebook-span">@</span>
                                                <input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="facebook-span" placeholder="......">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="instagram" class="form-label">Link Instagram (opsional)</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="instagram-span">@</span>
                                                <input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="instagram-span" placeholder="......">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="youtube" class="form-label">Channel Youtube (opsional)</label>
                                            <input type="text" class="form-control" id="youtube" name="youtube" placeholder="......">
                                        </div> --}}
                                        <div class="d-flex justify-content-end gap-3">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
{{-- sc baru --}}
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#konten').froalaEditor({
                // Setel URL unggah gambar.
                imageUploadURL: '{{ route('upload-img-artikel') }}',
                imageUploadParams: {
                    _token: '{{ csrf_token() }}' // Tambahkan token CSRF
                },
                imageUploadMethod: 'POST',
                imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif'],
                imageMaxSize: 2048 * 1024, // 2MB
            });
        });
    });
</script>

