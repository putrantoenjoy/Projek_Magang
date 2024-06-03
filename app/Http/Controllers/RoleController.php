<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
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
        Role::find($id)->delete();
        return back();
    }
}