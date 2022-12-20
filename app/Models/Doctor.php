<?php

namespace App\Models;

use App\Models\Spesialis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    protected $fillable = [
        'id_spesialis',
        'nama',
        'nomor_telepon',
        'email',
        'username',
        'password',
        'alamat'
    ];

    use HasFactory;

    protected $table = 'tb_doctors';
    protected $primaryKey = 'doctor_id';
}
