<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $table = 'poli';

    protected $fillable = [
        'nama_poli',
        'kode_poli'
    ];

    public function dokter()
    {
        return $this->hasMany(Poli::class, 'id_poli');
    }
    
    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_poli');
    }
}
