<div class="modal fade" id="addPermissionStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Menambah Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('permission-create') }}" method="post" class="" id="permission">
                @csrf
                <div class="modal-body">
                    <div class="d-flex flex-column mb-3">
                        <label for="namarole">Navigation</label>
                        <select name="addnavigasi" id="addnavigasi" class="form-control">
                            @foreach ($allnavigasi as $navigasi)
                                <option value="{{ $navigasi->id }}">{{ $navigasi->view }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" id="addnavigasi" name="addnavigasi" class="form-control"> --}}
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label for="namarole">Nama Permission</label>
                        <input type="text" id="addpermission" name="addpermission" class="form-control" required>
                    </div>
                </div>
                <div class="p-3 d-flex justify-content-end gap-1">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>