<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PendaftaranAnggota extends Model
{
    protected $table = 'pendaftaran_anggota';
    protected $fillable = ['id_user', 'id_organisasi', 'dokumen_pendukung', 'status', 'keterangan'];
    public $timestamps = false;
}