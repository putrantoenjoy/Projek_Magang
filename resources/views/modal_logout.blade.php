<div class="modal fade" id="LogOutstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="LogOutstaticBackdropLabel">Pemberitahuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('logout') }}" method="post" id="logout">
                @csrf
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="nama" class="text-center fs-5">Apakah anda yakin ingin keluar?</label>
                    </div>
                </div>
                <div class="p-3 d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                    <a href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();" class="btn btn-danger">Keluar</a>
                </div>
            </form>
        </div>
    </div>
</div>