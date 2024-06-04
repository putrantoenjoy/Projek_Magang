<?php

namespace App\Http\Controllers;

use App\Models\Model_Has_Role;
use App\Models\Navigation;
use App\Models\Role_Has_Permission;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    function __construct(){
        $this->middleware(['role:admin','permission:role-index|role-update|role-create|role-delete']);
    }
    public function index(Request $request)
    {
        $cari = $request->get('cari');

        $query = Role::with('permissions');

        if ($cari) {
            $query->where('name', 'like', "%$cari%");
        }

        $alldata = $query->get();
        $permissions = Permission::get();
        $allnavigasi = Navigation::get();

        return view('role.index', compact('alldata', 'permissions', 'allnavigasi', 'cari'));
    }
    public function create(Request $request)
    {
        $data = new Role();
        $data->name = $request->nama;
        $data->save();

        return back();
    }
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->sync($request->permission_id);
        Artisan::call('optimize:clear');

        return redirect()->back()->with('status', 'Permissions updated successfully!');
    }
    public function delete($id)
    {
        Model_Has_Role::where('role_id', $id)->delete();
        Role_Has_Permission::where('role_id', $id)->delete();
        Role::find($id)->delete();

        return redirect()->back()->with('delete', 'Role berhasil dihapus!');
    }
}