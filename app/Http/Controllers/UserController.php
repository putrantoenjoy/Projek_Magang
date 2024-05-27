<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Hash;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $allrole = Role::get();
        $query = User::query();

        if ($request->has('cari') && !empty($request->cari)) {
            $cari = $request->cari;
            $query->where(function($q) use ($cari) {
                $q->where('name', 'like', "%$cari%")
                  ->orWhere('email', 'like', "%$cari%");
            });
        } else {
            $cari = '';
        }

        $alldata = $query->paginate(10);

        return view('user.index', compact('alldata', 'allrole', 'cari'));
    }

    public function create(Request $request)
    {
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

    public function update()
    {
        return view('user.index');
    }

    public function delete()
    {
        return view('user.index');
    }
}
