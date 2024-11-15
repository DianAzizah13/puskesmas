<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'nik',
        'nama_pasien',
        'penjamin',
        'jenis_kelamin',
        'alamat',
        'telepon',
        'tanggal_lahir',
        'bpjs'
    ];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_pasien');
    }
}
