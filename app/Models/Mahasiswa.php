<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    
    public $timestamps = false; 

    protected $fillable = [
        'id_user', 
        'nim', 
        'nama', 
        'id_program_studi', 
        'semester'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}