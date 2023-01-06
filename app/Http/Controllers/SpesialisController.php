<?php

namespace App\Http\Controllers;

use App\Models\Spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpesialisController extends Controller
{
    public function index() {
        // $data_spesialis = Spesialis::all();
        $data_spesialis = DB::table('tb_spesialis')
        ->select(DB::raw('tb_spesialis.*, count(tb_praktik.id_praktik) as count_praktik'))
        ->leftJoin('tb_doctors', 'tb_spesialis.id_spesialis', '=', 'tb_doctors.id_spesialis')
        ->leftJoin('tb_praktik', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->groupBy('tb_spesialis.id_spesialis')
        ->get();

        return view('user.spesialis.index', [
            'active' => 'spesialis',
            'data_spesialis' => $data_spesialis
        ]);
    }

    public function admin() {
        $data_spesialis = DB::table('tb_spesialis')
        ->select(DB::raw('tb_spesialis.*, count(tb_doctors.doctor_id) as count_doctor, count(tb_praktik.id_praktik) as count_praktik'))
        ->leftJoin('tb_doctors', 'tb_spesialis.id_spesialis', '=', 'tb_doctors.id_spesialis')
        ->leftJoin('tb_praktik', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->groupBy('tb_spesialis.id_spesialis')
        ->get();
        return view('admin.spesialis', [
            'active' => 'spesialis',
            'data_spesialis' => $data_spesialis
        ]);
    }

    public function detail($id) {
        $data_doctor = DB::table('tb_doctors')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_spesialis.id_spesialis', '=', $id)
        ->get();

        $data_praktik = DB::table('tb_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_spesialis.id_spesialis', '=', $id)
        ->get();

        return view('user.spesialis.detail', [
            'active' => 'spesialis',
            'data_doctor' => $data_doctor,
            'data_praktik' => $data_praktik
        ]);
    }

    public function admin_detail($id) {
        $data_doctor = DB::table('tb_doctors')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_spesialis.id_spesialis', '=', $id)
        ->get();

        $data_praktik = DB::table('tb_praktik')
        ->join('tb_jadwal', 'tb_praktik.id_jadwal', '=', 'tb_jadwal.id_jadwal')
        ->join('tb_doctors', 'tb_praktik.doctor_id', '=', 'tb_doctors.doctor_id')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('tb_spesialis.id_spesialis', '=', $id)
        ->get();

        return view('admin.spesialis.detail', [
            'active' => 'spesialis',
            'data_doctor' => $data_doctor,
            'data_praktik' => $data_praktik
        ]);
    }

    public function store(Request $request) {
        if(Spesialis::create([
            'nama_spesialis' => $request->nama_spesialis
        ])) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Ditambahkan",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Ditambahkan",'type' => 'error'), 500];
        }
        return response()->json($response);
    }

    public function delete($id) {
        if(Spesialis::destroy($id)) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Dihapus",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Dihapus",'type' => 'error'), 500];
        }
        return response()->json($response);
    }

    public function edit($id)
    {
        $data_spesialis = Spesialis::find($id);
        return view('admin.spesialis.edit', [
            'active' => 'spesialis',
            'data_spesialis' => $data_spesialis,
            'id_spesialis' => $id
        ]);
    }

    public function update(Request $request, $id) {
        $spesialis = Spesialis::find($id);
        $spesialis->nama_spesialis = $request->nama_spesialis;
        if($spesialis->save()) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Dirubah",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Dirubah",'type' => 'error'), 500];
        }
        return response()->json($response);
    }

}
