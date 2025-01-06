<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',         // Menambahkan transaksi_id
        'metode_pembayaran',    // Kolom lainnya
        'tanggal_pembayaran',
        'total_bayar',
        'status_pembayaran',
    ];

    // Menetapkan transaksi_id sebagai primary key
    protected $primaryKey = 'transaksi_id';  // Primary key custom
    public $incrementing = false;           // Non-incrementing key
    protected $keyType = 'string';

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'pembayaran_user', 'transaksi_id', 'user_id');
    // }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'transaksi_id');
    }
}
