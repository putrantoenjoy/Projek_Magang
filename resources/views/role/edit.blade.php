<div class="modal fade" id="EditstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditstaticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditstaticBackdropLabel">Mengubah Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editrole">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="col-12 g-3 row px-5 py-3">
                        @foreach ($allnavigasi as $navigasi)
                            <div class="col-6">
                                <h4 class="my-1">{{ $navigasi->view }}</h4>
                                @foreach ($permissions as $permission)
                                    @if ($permission->navigation_id == $navigasi->id)
                                        <div class="d-flex">
                                            <input class="form-check-input permission" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="permission{{ $permission->id }}">&nbsp;{{ $permission->name }}
                                            <br>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="p-3 d-flex justify-content-end gap-1">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="simpanEdit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let id_permission = "";

    // Event handler untuk tombol simpan
    $('#simpanEdit').click(function() {
        var permission_id = [];
        $('.permission:checked').each(function() {
            permission_id.push($(this).val());
        });

        $.ajax({
            url: '{{ route('role-update', ['id' => ':id']) }}'.replace(':id', id_permission),
            type: 'POST', // Gunakan metode POST
            data: { 
                permission_id: permission_id,
                _method: 'PATCH', // Spoofing method
                _token: "{{ csrf_token() }}" 
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    // Event handler untuk membuka modal edit
    $("#table").on("click", "#edit", function (){
        $(".permission").attr("checked", false);
        let data = $(this).data("data");
        id_permission = data.id;

        $("#editrole").val(data.name);
        let permission = data.permissions;
        permission.forEach(element => {
            $("#permission" + element.id).attr('checked', true);
        });

        // Buka modal
        $('#EditstaticBackdrop').modal('show');
    });
</script>