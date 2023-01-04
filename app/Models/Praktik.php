<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktik extends Model
{
    protected $fillable = [
        'id_jadwal',
        'doctor_id',
        'waktu_awal',
        'waktu_akhir'
    ];

    use HasFactory;

    protected $table = 'tb_praktik';
    protected $primaryKey = 'id_praktik';
}
