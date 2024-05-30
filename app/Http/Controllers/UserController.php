<?php

namespace App\Http\Controllers;

use App\Models\Role_Has_Permission;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Hash;
use App\Models\User;
// use PDF;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $allrole = Role::get();
        $roleCheck = DB::table('model_has_roles')->get();
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

        return view('user.index', compact('alldata', 'allrole', 'roleCheck', 'cari'));
    }

    public function create(Request $request)
    {
        $data=[
            'name'=> $request->nama,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ];
        $user = User::create($data);
        $user->assignRole($request->role);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $role = User::find($id);
        $name = $role->roles->first()->name;
        $role->removeRole($name);
        $role->assignRole($request->editrole);

        $user = User::find($id);
        // $password = $user->password;
        $user->name = $request->editnama;
        $user->email = $request->editemail;
        // if(empty($request->password)){
        //     $user->password = Hash::make($password);
        // }
        // $user->password = Hash::make($request->editpassword);
        $user->update();

        return redirect()->back();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
    public function export()
    {
        $data = User::get();

        $pdf = PDF::loadView('user.pdf', compact('data'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
