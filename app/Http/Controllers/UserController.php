<?php

namespace App\Http\Controllers;

use App\Models\Role_Has_Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Hash;
use App\Models\User;
use PDF;

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
            'password'=> Hash::make($request->password),
        ];
        $user = User::create($data);
        // $role=[
        //     'role_id'=> $request->role,
        //     'user_id'=> $user->id,
        // ];
        // Role_Has_Permission::create($role);
        $user->assignRole($request->role);

        return redirect()->back();
    }

    public function update()
    {
        return view('user.index');
    }

    public function delete()
    {
        return view('user.index');
    }
    public function export()
    {
        $data = User::get();

        $pdf = PDF::loadView('user.pdf', compact('data'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
