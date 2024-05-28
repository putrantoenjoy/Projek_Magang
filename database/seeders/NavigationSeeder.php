<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'user', 'artikel', 'event', 'galeri', 'role permission', 'tim kerja'
        ];
        for($i = 0; $i < count($data); $i++){
            
        }
    }
}
$navigation = [
                'view' => $data[$i],
            ];
            Navigation::create($navigation);