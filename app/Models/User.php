<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $primaryKey = 'users_id';
    protected $fillable = [
        'users_username', 'users_password', 'users_fullname', 'users_email',
        'users_nohp', 'users_alamat', 'users_profil', 'users_level'
    ];
    
    // Hash password before saving
    public function setUsersPasswordAttribute($value)
    {
        $this->attributes['users_password'] = bcrypt($value);
    }

    // Relasi dengan Metode Pembayaran
    public function metodePembayaran()
    {
        return $this->hasMany(MetodePembayaran::class, 'metode_pembayaran_users_id');
    }

    // Relasi dengan Pembelian
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'pembelian_users_id');
    }
}
