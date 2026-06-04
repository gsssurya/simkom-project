<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranAnggota extends Model
{
    protected $table = 'pendaftaran_anggota';
    
    public $timestamps = false; 

    protected $fillable = [
        'id_user', 
        'id_organisasi', 
        'dokumen_pendukung', 
        'status', 
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi', 'id');
    }
}