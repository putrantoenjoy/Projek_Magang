<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionControler extends Controller
{
    //
    public function create(Request $request)
    {
        $data = [
            'navigation_id' => $request->addnavigasi,
            'view' => $request->addpermission,
            'name' => $request->addpermission
        ];
        Permission::create($data);
        return redirect()->back();
    }
}
