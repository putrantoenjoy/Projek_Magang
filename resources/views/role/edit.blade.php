<div class="modal fade" id="EditstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditstaticBackdropLabel">Menambah Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('role-create') }}" method="post" id="addrole">
                @csrf
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="namarole">Nama role</label>
                        <input type="text" id="namarole" name="nama" id="" class="form-control">
                    </div>
                </div>
                <div class="p-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>