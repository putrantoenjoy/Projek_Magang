<div class="modal fade" id="DeleteUserstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="DeleteUserstaticBackdrop">Pemberitahuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user-delete', $data->id) }}" method="post" id="logout">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="nama" class="text-center fs-5">Apakah anda yakin ingin menghapus user {{ $data->name }}?</label>
                    </div>
                </div>
                <div class="p-3 d-flex justify-content-center gap-5">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>