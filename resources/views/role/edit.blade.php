<div class="modal fade" id="EditstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditstaticBackdropLabel">Mengubah Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('role-create') }}" method="post" id="editrole">
                @csrf
                <div class="modal-body">
                    <label for="_dm-inputLname" class="form-label">User</label>
                    <div class="col-12 row p-2">
                        @foreach ($permissions as $permission)
                        <div class="form-check col-6">
                            <input class="form-check-input permission" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="permission{{ $permission->id }}">
                            <label class="form-check-label" for="permission{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </form>
            <div class="p-3 d-flex justify-content-end">
                <form action="" method="post" class="m-0">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="simpanEdit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function resetForm() {
        
        document.getElementById("role-form-edit").reset();
    }
    function submitForm() {
        
        document.getElementById("editrole").submit();
    }
    let id_permission = "";
    

    $('#simpanEdit').click(function() {
        var permission_id = [];
        $('.permission:checked').each(function() {
            permission_id.push($(this).val());
        });
        console.log(permission_id);
        
        $.ajax({
            url: '{{ route('role-update', ['id' => ':id']) }}'.replace(':id', id_permission),
            type: 'PUT',
            data: { 
                role_id: id_permission,
                permission_id: permission_id,
                _token: "{{ csrf_token() }}" 
            },                
            success: function(response) {
                console.log(response);
                location.reload();
                // Menghandle kesuksesan
            },
            error: function(xhr, status, error) {
                console.error(error);
                // Menghandle error
            }
        });
    });

    $("#table").on("click", "td #edit", function (){
        $(".permission").attr("checked", false);
        let data = $(this).data("data")
        id_permission = data.id;
        $("#role-edit").val(data.name)
        let permission = data.permissions
        permission.forEach(element => {
            $("#permission"+element.id).attr('checked', true);
        });
    })
</script>