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
                    <div class="d-flex flex-column mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                        @if($errors->has('nama'))
                            <div class="alert-danger">
                                <small class="text-danger">
                                    {{ $errors->first('nama') }}
                                </small>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        @if($errors->has('email'))
                            <div class="alert-danger">
                                <small class="text-danger">
                                    {{ $errors->first('email') }}
                                </small>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="" hidden selected disabled>Pilih</option>
                            @foreach ($allrole as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('role'))
                            <div class="alert-danger">
                                <small class="text-danger">
                                    {{ $errors->first('role') }}
                                </small>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label for="namarole">Password</label>
                        <input type="password" name="password" id="" class="form-control" required>
                        @if($errors->has('password'))
                            <div class="alert-danger">
                                <small class="text-danger">
                                    {{ $errors->first('password') }}
                                </small>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label for="namarole">Konfirmasi Password</label>
                        <input type="password" name="confirmation_password" id="" class="form-control" required>
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