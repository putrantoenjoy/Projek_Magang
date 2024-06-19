<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $guarded = ['id'];

    protected $fillable = [
        'nama',
        'tempat',
        'tanggal_mulai',
        'tanggal_akhir',
        'waktu_mulai',
        'waktu_akhir',
        'status_id',
    ];
    public function eventstatus()
    {
        return $this->belongsTo(EventStatus::class, 'status_id');
    }
}
