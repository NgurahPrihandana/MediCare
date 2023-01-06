<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrasiController extends Controller
{
    public function index() {
        $data_registrasi = DB::table('tb_registrasi')
        ->join('tb_users', 'tb_registrasi.id_user', '=', 'tb_users.id')
        ->join('tb_praktik', 'tb_registrasi.id_praktik', '=', 'tb_praktik.id_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_users.id', '=', session()->get('id'))
        ->get();

        return view('user.registrasi.index', [
            'active' => 'registrasi',
            'data_registrasi' => $data_registrasi
        ]);
    }

    public function admin() {
        // $data_praktik = DB::table('tb_praktik')
        // ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        // ->join('tb_registrasi', 'tb_praktik.id_praktik', '=', 'tb_registrasi.id_praktik')
        // ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        // ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        // ->groupBy('tb_spesialis.id_spesialis')
        // ->get();
        // dd($data_praktik);

        $data_spesialis = DB::table('tb_spesialis')
        ->select(DB::raw('tb_spesialis.*, count(tb_doctors.doctor_id) as count_doctor, count(tb_praktik.id_praktik) as count_praktik'))
        ->leftJoin('tb_doctors', 'tb_spesialis.id_spesialis', '=', 'tb_doctors.id_spesialis')
        ->leftJoin('tb_praktik', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->groupBy('tb_spesialis.id_spesialis')
        ->get();

        // $data_registrasi = DB::table('tb_registrasi')
        // ->join('tb_users', 'tb_registrasi.id_user', '=', 'tb_users.id')
        // ->join('tb_praktik', 'tb_registrasi.id_praktik', '=', 'tb_praktik.id_praktik')
        // ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        // ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        // ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        // ->get();


        return view('admin.registrasi.index', [
            'active' => 'registrasi',
            'data_spesialis' => $data_spesialis
        ]);
    }

    public function registrasi($id) {
        $data_praktik = DB::table('tb_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_praktik.id_praktik', '=', $id)
        ->first();
        
        return view('user.registrasi.regis', [
            'active' => 'booking',
            'data_praktik' => $data_praktik
        ]);
    }

    public function store(Request $request) {
        // dd($request->all());
        if(Registrasi::create([
            'id_user' => $request->id_user,
            'id_praktik' => $request->id_praktik,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keluhan' => $request->keluhan,
            'tanggal_kedatangan' => $request->tanggal_kedatangan
        ])) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Dibooking",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Dibooking",'type' => 'error'), 500];
        }
        return response()->json($response);
    }

    public function detail_spesialis($id) {
        $data_praktik = DB::table('tb_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_spesialis.id_spesialis', '=', $id)
        ->get();
        
        return view('admin.registrasi.detail', [
            'active' => 'registrasi',
            'data_praktik' => $data_praktik
        ]);
    }

    public function detail_registrasi($id) {
        $data_registrasi = DB::table('tb_registrasi')
        ->join('tb_users', 'tb_registrasi.id_user', '=', 'tb_users.id')
        ->join('tb_praktik', 'tb_registrasi.id_praktik', '=', 'tb_praktik.id_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_registrasi.id_registrasi', '=', $id)
        ->first();

        return view('user.registrasi.detail', [
            'active' => 'praktik',
            'data_registrasi' => $data_registrasi
        ]);
    }

    public function detail_spesialis_user($id, $id2) {
        $data_registrasi = DB::table('tb_registrasi')
        ->join('tb_users', 'tb_registrasi.id_user', '=', 'tb_users.id')
        ->join('tb_praktik', 'tb_registrasi.id_praktik', '=', 'tb_praktik.id_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_spesialis.id_spesialis', '=', $id)
        ->where('tb_praktik.id_praktik', '=', $id2)
        ->get();

        return view('admin.registrasi.detail-user', [
            'active' => 'registrasi',
            'data_registrasi' => $data_registrasi
        ]);
    }
}
