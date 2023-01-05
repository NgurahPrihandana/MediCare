<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Spesialis;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function create() {
        $data_spesialis = Spesialis::all();
        return view('admin.doctor.create', [
            'active' => 'doctor',
            'data_spesialis' => $data_spesialis
        ]);
    }

    public function store(Request $request) {
        $email = User::where('email', '=', $request->email)->first();
        if(isset($email) && $email !== '') {
            $response = [array('title' => "Gagal", 'msg'=> "Email telah digunakan",'type' => 'error'), 500];
            return response()->json($response);
        }

        $emailDoctor = Doctor::where('email', '=', $request->email)->first();
        if(isset($emailDoctor) && $emailDoctor !== '') {
            $response = [array('title' => "Gagal", 'msg'=> "Email telah digunakan",'type' => 'error'), 500];
            return response()->json($response);
        }
        
        if(Doctor::create([
            'id_spesialis' => $request->id_spesialis,
            'nama' => $request->nama,
            'nomor_telepon' => $request->nomor_telepon,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat
        ])) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Ditambahkan",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Ditambahkan",'type' => 'error'), 500];
        }
        return response()->json($response);
    }

    public function edit($id)
    {
        $data_doctor = DB::table('tb_doctors')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('doctor_id', '=', $id)
        ->first();
        $data_spesialis = Spesialis::all();
        return view('admin.doctor.edit', [
            'active' => 'spesialis',
            'data_doctor' => $data_doctor,
            'data_spesialis' => $data_spesialis,
            'id_doctor' => $id
        ]);
    }

    public function find($id) {
        $doctor = DB::table('tb_doctors')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->where('doctor_id', '=', $id)
        ->first();
        return response()->json($doctor);
    }

    public function update(Request $request, $id) {
        $doctor = Doctor::find($id);
        $doctor->id_spesialis = $request->id_spesialis;
        $doctor->nama = $request->nama;
        $doctor->nomor_telepon = $request->nomor_telepon;
        $doctor->username = $request->username;
        $doctor->email = $request->email;
        if(isset($request->old_password) || isset($request->password)) {
            if(HASH::check($request->old_password, $doctor->password)) {
                $doctor->password = bcrypt($request->password);
            } else {
                return response()->json([array('title' => "Error", 'msg' => "Ada kesalahan dengan data password",'type' => 'error'), 500]);
            }
        }
        $doctor->alamat = $request->alamat;
        if($doctor->save()) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Dirubah",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Dirubah",'type' => 'error'), 500];
        }
        return response()->json($response);
    }

    public function delete($id) {
        if(Doctor::destroy($id)) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Dihapus",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Dihapus",'type' => 'error'), 500];
        }
        return response()->json($response);
    }
}
