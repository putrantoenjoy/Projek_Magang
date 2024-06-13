<?php

namespace Database\Seeders;

use App\Models\Role_Has_Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create role admin
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        // create role relation permission
        $permission = Permission::get();
        $admin = DB::table('roles')->where('name', 'admin')->first();

        for ($i = 1; $i <= count($permission); $i++) {
            $role = [
                'permission_id' => $i,
                'role_id' => $admin->id,
            ];
            Role_Has_Permission::create($role);
        }
    }
}
