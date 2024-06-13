<?php

namespace App\Http\Controllers;

use App\Models\Role_Has_Permission;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'role' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
        $filename = 'backup-' . date('Y-m-d_H-i-s') . '.sql';
        
        $tables = DB::select('SHOW TABLES');
        $database = env('DB_DATABASE');

        $sqlScript = "";
        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0];

            // Add table creation statement
            $createTableResult = DB::select("SHOW CREATE TABLE `$tableName`");
            $createTableStatement = $createTableResult[0]->{'Create Table'};
            $sqlScript .= "\n\n" . $createTableStatement . ";\n\n";

            // Add table data
            $tableData = DB::table($tableName)->get();
            foreach ($tableData as $row) {
                $sqlScript .= "INSERT INTO `$tableName` VALUES(";
                foreach ($row as $value) {
                    $value = addslashes($value);
                    $value = str_replace("\n", "\\n", $value);
                    $sqlScript .= "'$value', ";
                }
                $sqlScript = rtrim($sqlScript, ", ");
                $sqlScript .= ");\n";
            }
            $sqlScript .= "\n\n\n";
        }

        // Store the SQL script temporarily
        Storage::disk('local')->put($filename, $sqlScript);

        // Return the file as a download response
        return response()->download(storage_path("app/{$filename}"))->deleteFileAfterSend(true);
    }
}
