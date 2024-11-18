<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_website',
        'alamat',
        'telepon',
        'email',
        'facebook_link',
        'instagram_link',
        'youtube_link',
        'whatsapp_link',
    ];
}
