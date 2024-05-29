<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $alldata = Role::with('permissions')->get();
        $permissions = Permission::get();
        $allnavigasi = Navigation::get();
        return view('role.index', compact('alldata', 'permissions', 'allnavigasi'));
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
        // DB::table('role_has_permissions')->where('role_id', $request->role_id)->delete();
        // for ($i=0; $i < count($request->permission_id); $i++) { 
        //     $data = [
        //         "role_id" => $request->role_id,
        //         "permission_id" => $request->permission_id[$i],
        //     ];
        //     DB::table('role_has_permissions')->insert($data);
        // }
        // return back();

        $role = Role::findOrFail($id);
        
        // Validasi input
        // $validated = $request->validate([
        //     'permission_id' => 'array',
        //     'permission_id.*' => 'exists:permissions,id',
        // ]);

        // Sinkronisasi permission dengan role
        $role->permissions()->sync($request->permission_id);

        return response()->json(['message' => 'Permissions updated successfully!']);
    }
    public function delete($id)
    {
        Role::find($id)->delete();
        return back();
    }
}
