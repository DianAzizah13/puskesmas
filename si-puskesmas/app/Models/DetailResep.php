<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
    use HasFactory;

    protected $table = 'detail_resep';

    protected $fillable = [
        'id_resep',
        'id_obat',
        'jumlah',
        'keterangan',
    ];

    public function resepObat()
    {
        return $this->belongsTo(ResepObat::class, 'id_resep');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
