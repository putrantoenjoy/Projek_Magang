<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create kategori
        $data = [
            'ekonomi', 'olahraga', 'event', 'teknologi', 'otomotif', 'politik'
        ];
        for($i = 0; $i < count($data); $i++){
            $kategori = [
                'nama' => $data[$i],
            ];
            Kategori::create($kategori);
        }
    }
}
