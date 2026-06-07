<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnggotaOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'anggota_organisasi';
    const UPDATED_AT = null;

    protected $fillable = [
        'id_user',
        'id_organisasi',
        'id_periode',
        'jabatan',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function organisasi(): BelongsTo
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi', 'id');
    }

    public function periode(): BelongsTo
    {
        return $this->belongsTo(PeriodeKepengurusan::class, 'id_periode', 'id');
    }
}