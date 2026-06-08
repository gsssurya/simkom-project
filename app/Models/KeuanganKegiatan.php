<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KeuanganKegiatan extends Model
{
    use HasFactory;

    protected $table = 'keuangan_kegiatan';
    const UPDATED_AT = null;

    protected $fillable = [
        'id_kegiatan',
        'jenis_transaksi',
        'nominal',
        'keterangan',
        'bukti_pembayaran',
    ];

    // Konversi tipe decimal dari database agar menjadi float/double di PHP secara otomatis
    protected $casts = [
        'nominal' => 'double',
    ];

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan', 'id');
    }
}