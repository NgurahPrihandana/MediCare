<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Praktik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PraktikController extends Controller
{
    public function index() {
        $data_praktik = DB::table('tb_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->get();

        return view('user.praktik.index', [
            'active' => 'praktik',
            'data_praktik' => $data_praktik
        ]);
    }

    public function admin() {
        $data_praktik = DB::table('tb_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->get();

        return view('admin.praktik.index', [
            'active' => 'praktik',
            'data_praktik' => $data_praktik
        ]);
    }

    public function create() {
        $data_jadwal = Jadwal::all();
        $data_doctor = DB::table('tb_doctors')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->get();

        return view('admin.praktik.create', [
            'active' => 'praktik',
            'data_jadwal' => $data_jadwal,
            'data_doctor' => $data_doctor
        ]);
    }

    public function store(Request $request) {
        if(Praktik::create([
            'id_jadwal' => $request->id_jadwal,
            'doctor_id' => $request->doctor_id,
            'waktu_awal' => $request->waktu_awal,
            'waktu_akhir' => $request->waktu_akhir
        ])) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Ditambahkan",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Ditambahkan",'type' => 'error'), 500];
        }
        return response()->json($response);
    }
}
