<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan';

    protected $fillable = [
        'id_pasien',
        'id_poli',
        'id_waktu',
        'tanggal_kunjungan',
        'kode_kunjungan',
        'status',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    public function waktu()
    {
        return $this->belongsTo(Waktu::class, 'id_waktu');
    }

    public function rekamMedis()
    {
        return $this->hasOne(RekamMedis::class, 'id_kunjungan');
    }
}
