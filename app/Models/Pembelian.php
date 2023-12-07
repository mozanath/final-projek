<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';
    protected $primaryKey = 'pembelian_id';
    protected $fillable = [
        'user_id',
        'metode_pembayaran_id',
        'tanggal',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_pembayaran_id', 'metode_pembayaran_id');
    }

    public function pembelianDetails()
    {
        return $this->hasMany(PembelianDetail::class, 'pembelian_id', 'pembelian_id');
    }
}
