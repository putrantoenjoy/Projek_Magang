<div class="modal fade" id="ShowstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ShowstaticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ShowstaticBackdropLabel">Mengubah Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="showrole">
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
                                            <input class="form-check-input permission" type="checkbox" value="{{ $permission->id }}" name="permissionshow[]" id="permissionshow{{ $permission->id }}">&nbsp;{{ $permission->name }}
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
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let id_permissionshow = "";

    // Event handler untuk membuka modal edit
    $("#table").on("click", "#show", function (){
        $(".permission").attr("checked", false);
        let data = $(this).data("data");
        id_permissionshow = data.id;

        $("#showrole").val(data.name);
        let permission = data.permissions;
        permission.forEach(element => {
            $("#permissionshow" + element.id).attr('checked', true);
        });
    });
</script>