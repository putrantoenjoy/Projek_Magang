<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // permission
        // $data = [
        //     'user', 'artikel', 'event', 'galeri', 'role permission', 'tim kerja'
        // ];
        // $view = [
        //     'index', 'create', 'update', 'delete'
        // ];
        // Permission::create($data);
        // for($i = 0; $i < count($data); $i++){
        //     for($j = 0; $j < count($view); $j++){
        //         $permission = [
        //             'navigation_id' =>$data[$i],
        //             'name' => $view[$j],
        //             'view' => $view[$j],
        //         ];
        //         Permission::create($permission);
        //     }
        // }

        // $data = [
        //     1, 2, 3, 4, 4, 6
        // ];
        $data = Navigation::get();
        // echo $Navigation[0]->view;
        $view = [
            'index', 'create', 'update', 'delete'
        ];
        
        // Loop melalui setiap item data dan buat permission untuk setiap view
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($view); $j++) {
                $permission = [
                    'navigation_id' => $data[$i]->id,
                    'name' => $data[$i]->view . '-' . $view[$j],
                    'view' => $view[$j],
                ];
                Permission::create($permission);
            }
        }
    }
}
