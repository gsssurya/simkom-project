<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';
    
    public $timestamps = false;

    protected $fillable = [
        'email',
        'no_telepon',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function mahasiswa(): HasOne
    {
        return $this->hasOne(Mahasiswa::class, 'id_user', 'id');
    }

    public function pembina(): HasOne
    {
        return $this->hasOne(Pembina::class, 'id_user', 'id');
    }

    public function anggotaOrganisasi(): HasMany
    {
        return $this->hasMany(AnggotaOrganisasi::class, 'id_user', 'id');
    }

    public function pendaftaranOrganisasi(): HasMany
    {
        return $this->hasMany(PendaftaranAnggota::class, 'id_user', 'id');
    }

    public function pendaftaranKegiatan(): HasMany
    {
        return $this->hasMany(PendaftaranPesertaKegiatan::class, 'id_user', 'id');
    }

    public function logAktivitas(): HasMany
    {
        return $this->hasMany(LogAktivitas::class, 'id_user', 'id');
    }
}