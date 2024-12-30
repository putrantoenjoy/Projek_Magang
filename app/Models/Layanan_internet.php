<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan_internet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_paket',
        'kategori',
        'harga',
        'kecepatan',
        'deskripsi',
        'benefit_id',
    ];
}
