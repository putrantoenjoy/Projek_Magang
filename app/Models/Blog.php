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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
