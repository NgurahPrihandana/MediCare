<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrasiController extends Controller
{
    public function registrasi($id) {
        $data_praktik = DB::table('tb_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_spesialis.id_spesialis', '=', $id)
        ->first();
        return view('user.registrasi.regis', [
            'active' => 'praktik',
            'data_praktik' => $data_praktik
        ]);
    }
}
