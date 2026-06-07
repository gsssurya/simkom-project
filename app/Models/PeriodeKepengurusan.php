<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PeriodeKepengurusan extends Model
{
    use HasFactory;

    protected $table = 'periode_kepengurusan';
    const UPDATED_AT = null;

    protected $fillable = [
        'id_organisasi',
        'tahun_mulai',
        'tahun_selesai',
        'status_periode',
    ];

    public function organisasi(): BelongsTo
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi', 'id');
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(AnggotaOrganisasi::class, 'id_periode', 'id');
    }

    public function kegiatan(): HasMany
    {
        return $this->hasMany(Kegiatan::class, 'id_periode', 'id');
    }
}