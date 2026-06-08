<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenKegiatan extends Model
{
    use HasFactory;

    protected $table = 'dokumen_kegiatan';
    const UPDATED_AT = null;

    protected $fillable = [
        'id_kegiatan',
        'jenis_dokumen',
        'nama_file',
        'path_url',
    ];

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan', 'id');
    }
}