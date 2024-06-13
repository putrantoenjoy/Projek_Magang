<div class="modal fade" id="EditstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditstaticBackdropLabel">Menambah user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user-update', $data->id) }}" method="post" id="editrole">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="d-flex flex-column mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="editnama" value="{{ $data->name }}" id="editnama" class="form-control">
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="editemail" value="{{ $data->email }}" id="editemail" class="form-control">
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label for="role">Role</label>
                        <select name="editrole" id="editrole" class="form-control">
                            @if(!empty($data->roles()->first()))
                                <option hidden selected value="{{ $data->roles()->first()->name }}">{{ $data->roles()->first()->name }}</option>
                            @else
                                <option hidden selected disabled>Pilih</option>
                            @endif
                            @foreach ($allrole as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="d-flex flex-column">
                        <label for="namarole">Password</label>
                        <input type="password" name="editpassword" id="editpassword" class="form-control">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="namarole">Konfirmasi Password</label>
                        <input type="password" name="editconfirmation_password" id="editconfirm_password" class="form-control">
                    </div> --}}
                </div>
                <div class="p-3 d-flex justify-content-end gap-1">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>