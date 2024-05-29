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
        $data = DB::table('role_has_permissions')->where('role_id', $id)->get();
        
        return back()->with('status', 'Role berhasil diperbarui!');
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        
        return back()->with('delete', 'Role berhasil dihapus!');
    }
}
