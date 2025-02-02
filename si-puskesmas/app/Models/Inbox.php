<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;

    protected $table = 'inboxes';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'pesan',
    ];
}
