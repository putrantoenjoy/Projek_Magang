<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'roles';
    protected $fillable = [
        // 'guard_name'
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
