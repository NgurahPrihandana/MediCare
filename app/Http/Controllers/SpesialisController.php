<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spesialis;

class SpesialisController extends Controller
{
    public function index() {
        $data_spesialis = Spesialis::all();
        return view('admin.spesialis', [
            'active' => 'spesialis',
            'data_spesialis' => $data_spesialis
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
