<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $alldata = Role::get();
        return view('role.index', compact('alldata'));
    }
    public function create(Request $request)
    {
        $data = [
            'name' => $request->nama
        ];
        DB::table('roles')->insert($data);
        return back();
    }
    public function update(Request $request, $id)
    {
        $data = DB::table('role_has_permissions')->where('role_id', $id)->get();
        
        return back();
    }
    public function delete($id)
    {
        return back();
    }
}
