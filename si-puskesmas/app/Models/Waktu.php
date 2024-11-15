<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    use HasFactory;

    protected $table = 'waktu';

    protected $fillable = [
        'jam',
    ];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_waktu');
    }
}
