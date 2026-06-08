<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasi';
    
    // Hanya memiliki kolom created_at, tidak ada updated_at
    const UPDATED_AT = null;

    protected $fillable = [
        'id_jenis_organisasi',
        'nama',
        'visi',
        'misi',
        'deskripsi',
        'ad_art',
        'status',
    ];

    public function jenisOrganisasi(): BelongsTo
    {
        return $this->belongsTo(JenisOrganisasi::class, 'id_jenis_organisasi', 'id');
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(AnggotaOrganisasi::class, 'id_organisasi', 'id');
    }

    public function periodeKepengurusan(): HasMany
    {
        return $this->hasMany(PeriodeKepengurusan::class, 'id_organisasi', 'id');
    }

    public function kegiatan(): HasMany
    {
        return $this->hasMany(Kegiatan::class, 'id_organisasi', 'id');
    }

    public function pendaftaranAnggota(): HasMany
    {
        return $this->hasMany(PendaftaranAnggota::class, 'id_organisasi', 'id');
    }
}