<?php

namespace App\Http\Controllers;

use App\Models\Role_Has_Permission;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Hash;
use App\Models\User;

class UserController extends Controller
{
    //
    function __construct(){
        $this->middleware(['permission:user-index|user-update|user-create|user-delete']);
    }
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

        return redirect()->back()->with('status', 'User berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $role = User::find($id);
        
        if(!empty($role->roles->first()->name)){
            $role->removeRole($role->roles->first()->name);
        }
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

        return redirect()->back()->with('status', 'User berhasil diperbarui!');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('delete', 'User berhasil dihapus!');
    }
    public function export()
    {
        $databaseName = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $outputFile = storage_path('app/export_data.sql');

        exec("mysqldump --user={$username} --password={$password} {$databaseName} > {$outputFile}");

        // Memeriksa apakah file ada sebelum mengirimkan respons
        if (file_exists($outputFile)) {
            // Mengirimkan file SQL sebagai respons
            return response()->download($outputFile);
        } else {
            return redirect()->back()->with('delete', 'Failed to export data.');
        }
    }
}
