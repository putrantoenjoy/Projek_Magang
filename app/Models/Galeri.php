<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $guarded = ['id'];

    // protected static function boot(){
    //     parent::boot();
    
    //     static::created(function ($model) {
    //     $model->post_id = "PG00" . $model->id;
    //     $model->save();
    //     });
    // }

    public function getCreatedAtDateStringAttribute()
    {
        if ($this->created_at) {
            return $this->created_at->format('d-m-Y H:i:s');
        }
        return null;
    }
}
