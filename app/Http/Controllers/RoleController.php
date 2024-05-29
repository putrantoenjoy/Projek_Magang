<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use PDF;

class RoleController extends Controller
{
    //
    public function index()
    {
        $alldata = Role::get();
        $permissions = Permission::get();
        $allnavigasi = Navigation::get();
        return view('role.index', compact('alldata', 'permissions', 'allnavigasi'));
    }
    public function create(Request $request)
    {
        $data = new Role();
        $data->name = $request->nama;
        $data->save();

        return back()->with('status', 'Role berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        $role->permissions()->sync($request->permission_id);

        return back()->with('status', 'Role berhasil diperbarui!');
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        
        return back()->with('delete', 'Role berhasil dihapus!');
    }
    public function export()
    {
        $data = Role::get();

        $pdf = PDF::loadView('role.pdf', compact('data'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}