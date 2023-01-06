<?php

namespace App\Models;

use App\Models\Spesialis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    protected $fillable = [
        'id_spesialis',
        'nama',
        'nomor_telepon',
        'email',
        'username',
        'password',
        'alamat',
        'biodata'
    ];

    protected $hidden = [
        'password'
    ];

    use HasFactory;

    protected $table = 'tb_doctors';
    protected $primaryKey = 'doctor_id';
}
