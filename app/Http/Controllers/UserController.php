<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Hash;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        $allrole = Role::get();
        $alldata = User::get();

        return view('user.index', compact('alldata', 'allrole'));
    }
    public function create(Request $request){
        // dd($request->all());
        $data=[
            'name'=> $request->nama,
            'email'=> $request->email,
            // 'role'=> $request->role,
            'password'=> Hash::make($request->password),
        ];
        User::insert($data);
        return back();
    }
    public function update(){
        return view('user.index');
    }
    public function delete(){
        return view('user.index');
    }
}
