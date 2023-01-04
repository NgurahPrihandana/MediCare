<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    protected $fillable = [
        'nama_spesialis'
    ];

    protected $table = 'tb_spesialis';
    protected $primaryKey = 'id_spesialis';

    use HasFactory;
}
