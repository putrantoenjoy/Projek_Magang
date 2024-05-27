<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'blogs';
    protected $fillable = [
        'user_id',
        'penulis',
        'kategori_id'
    ];
}
