<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index() {
        $data_jadwal = Jadwal::all();
        return view('user.jadwal.index',[
            'active' => 'jadwal',
            'data_jadwal' => $data_jadwal
        ]);
    }

    public function admin() {
        $data_jadwal = Jadwal::all();
        return view('admin.jadwal.index', [
            'active' => 'jadwal',
            'data_jadwal' => $data_jadwal
        ]);
    }

    public function store(Request $request) {
        if(Jadwal::create([
            'hari' => $request->hari
        ])) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Ditambahkan",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Ditambahkan",'type' => 'error'), 500];
        }
        return response()->json($response);
    }

    public function delete($id) {
        if(Jadwal::destroy($id)) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Dihapus",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Dihapus",'type' => 'error'), 500];
        }
        return response()->json($response);
    }
}
