<?php

namespace Database\Seeders;

use App\Models\EventStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
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
            'akan datang', 'sedang berlangsung', 'selesai'
        ];
        for($i = 0; $i < count($data); $i++){
            $create = [
                'status' => $data[$i]
            ];
            EventStatus::create($create);
        }
    }
}
