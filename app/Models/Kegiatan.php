<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    
    // Tabel kegiatan murni tidak menggunakan default timestamps Laravel (created_at/updated_at)
    public $timestamps = false;

    protected $fillable = [
        'id_organisasi',
        'id_periode',
        'judul_kegiatan',
        'deskripsi',
        'tanggal_kegiatan',
        'waktu_kegiatan',
        'lokasi',
        'kuota_peserta',
        'status',
        'evaluasi_kegiatan',
    ];

    public function organisasi(): BelongsTo
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi', 'id');
    }

    public function periode(): BelongsTo
    {
        return $this->belongsTo(PeriodeKepengurusan::class, 'id_periode', 'id');
    }

    public function dokumen(): HasMany
    {
        return $this->hasMany(DokumenKegiatan::class, 'id_kegiatan', 'id');
    }

    public function keuangan(): HasMany
    {
        return $this->hasMany(KeuanganKegiatan::class, 'id_kegiatan', 'id');
    }

    public function pendaftaranPeserta(): HasMany
    {
        return $this->hasMany(PendaftaranPesertaKegiatan::class, 'id_kegiatan', 'id');
    }
}