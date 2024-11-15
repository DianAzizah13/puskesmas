<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';

    protected $fillable = [
        'nama_obat',
        'stok',
        'satuan',
        'kadaluwarsa',
    ];

    public function detailResep()
    {
        return $this->hasMany(DetailResep::class, 'id_obat');
    }

}
