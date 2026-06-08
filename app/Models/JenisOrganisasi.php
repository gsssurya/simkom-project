<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'jenis_organisasi';
    public $timestamps = false;

    protected $fillable = ['nama'];

    public function organisasi(): HasMany
    {
        return $this->hasMany(Organisasi::class, 'id_jenis_organisasi', 'id');
    }
}