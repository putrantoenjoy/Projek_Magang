<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index()
    {
        
        return view('role.index');
    }
    public function create(Request $request)
    {
        return back();
    }
    public function update(Request $request, $id)
    {
        return back();
    }
    public function delete($id)
    {
        return back();
    }
}
