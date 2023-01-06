<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $fillable = [
        'id_user',
        'id_praktik',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'keluhan',
        'tanggal_booking',
        'tanggal_kedatangan'
    ];

    use HasFactory;

    protected $table = 'tb_registrasi';
    protected $primaryKey = 'id_registrasi';
}
