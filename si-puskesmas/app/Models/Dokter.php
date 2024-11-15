<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'id_user',
        'id_poli',
        'nip',
        'telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }
    
    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'id_dokter');
    }
}
