<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaksi_id'; // Primary key custom
    public $incrementing = false; // Non-incrementing key
    protected $keyType = 'string'; // Tipe string untuk primary key

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            // Ambil 3 digit milisecond
            $milliseconds = substr((string) microtime(true), -3);

            // Format tanggal transaksi
            $tanggal = now()->format('dmY');

            // Ambil ID user
            $userId = str_pad($transaction->user_id, 3, '0', STR_PAD_LEFT); // Pad jika kurang dari 3 digit

            // Gabungkan untuk membuat transaction_id
            $transaction->transaction_id = $milliseconds . $tanggal . $userId;
        });
    }
}
