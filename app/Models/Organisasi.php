<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $table = 'organisasi';
    
    public $timestamps = false; 

    protected $fillable = [
        'id_jenis_organisasi', 
        'nama', 
        'visi', 
        'misi', 
        'deskripsi', 
        'ad_art', 
        'status'
    ];

    public function pendaftaran()
    {
        return $this->hasMany(PendaftaranAnggota::class, 'id_organisasi', 'id');
    }
}