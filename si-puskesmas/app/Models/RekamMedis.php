<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';

    protected $fillable = [
        'id_kunjungan',
        'id_dokter',
        'diagnosa',
        'anamnesa',
        'berat_badan',
        'tinggi_badan',
        'alergi_obat',
        'keterangan',
        'keluhan'
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function resepObat()
    {
        return $this->hasOne(ResepObat::class, 'id_rekam_medis');
    }
}
