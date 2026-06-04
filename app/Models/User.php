<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Menegaskan nama tabel di database asli Anda
    protected $table = 'user';

    // Kolom yang boleh diisi (Mass Assignable) sesuai SQL Dump Anda
    protected $fillable = [
        'email',
        'no_telepon',
        'password',
        'role',
    ];

    // Kolom yang disembunyikan saat data diubah ke array/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi ke biodata mahasiswa
     */
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id_user', 'id');
    }
}