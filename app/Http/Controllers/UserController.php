<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create() {
        return view('admin.user.create', [
            'active' => 'user'
        ]);
    }

    public function store(Request $request) {
        if(User::create([
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
        $data_user = User::find($id);
        return view('admin.user.edit', [
            'active' => 'spesialis',
            'data_user' => $data_user
        ]);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->nama = $request->nama;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->username = $request->username;
        $user->email = $request->email;
        if(isset($request->old_password) || isset($request->password)) {
            if(HASH::check($request->old_password, $user->password)) {
                $user->password = bcrypt($request->password);
            } else {
                return response()->json([array('title' => "Error", 'msg' => "Ada kesalahan dengan data password",'type' => 'error'), 500]);
            }
        }
        $user->alamat = $request->alamat;
        if($user->save()) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Dirubah",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Dirubah",'type' => 'error'), 500];
        }
        return response()->json($response);
    }

    public function delete($id) {
        if(User::destroy($id)) {
            $response = [array('title' => "Success", 'msg'=> "Data Berhasil Dihapus",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Data Gagal Dihapus",'type' => 'error'), 500];
        }
        return response()->json($response);
    }
}
