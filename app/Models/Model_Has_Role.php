<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Has_Role extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'model_has_roles';
}
