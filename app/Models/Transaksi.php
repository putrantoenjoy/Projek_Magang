<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Menambahkan kolom yang bisa diisi massal
    protected $fillable = [
        'user_id',
        'layanan_id',  // Menambahkan transaksi_id ke fillable
        'tanggal_aktif',
        'total_bayar',
        'status',
    ];

    // Menetapkan transaksi_id sebagai primary key
    protected $primaryKey = 'transaksi_id';  // Primary key custom
    public $incrementing = false;           // Non-incrementing key
    protected $keyType = 'string';           // Tipe string untuk primary key

    // Boot method untuk generate transaksi_id otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pembayaran) {
            // Ambil 3 digit milisecond
            $milliseconds = substr((string) microtime(true), -3);

            // Format tanggal pembayaran
            $tanggal = now()->format('dmY');

            // Ambil ID user
            $userId = str_pad($pembayaran->user_id, 3, '0', STR_PAD_LEFT); // Pad jika kurang dari 3 digit

            // Gabungkan untuk membuat transaksi_id
            $pembayaran->transaksi_id = $milliseconds . $tanggal . $userId;
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function layanan_internet()
    {
        return $this->belongsTo(Layanan_internet::class, 'layanan_id', 'id');
    }
}
