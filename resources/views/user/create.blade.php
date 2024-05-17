<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Menambah user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user-create') }}" method="post" id="addrole">
                @csrf
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="" hidden selected disabled>Pilih</option>
                            @foreach ($allrole as $role)
                                <option value="">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="namarole">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="namarole">Konfirmasi Password</label>
                        <input type="password" name="confirmation_password" id="" class="form-control">
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