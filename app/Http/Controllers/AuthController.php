<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login', [
            'title' => 'Login Page'
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if(Auth::user()->role == "admin") {
                return redirect()->intended('admin');
            } else if(Auth::user()->role == "user") {
                return redirect()->intended('user');
            }
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
        $username = User::where('username', '=', $request->username)->first();
        if(isset($username) && $username !== '') {
            $response = [array('title' => "Gagal", 'msg'=> "Username telah digunakan",'type' => 'error'), 500];
            return response()->json($response);
        }

        $email = User::where('email', '=', $request->email)->first();
        if(isset($email) && $email !== '') {
            $response = [array('title' => "Gagal", 'msg'=> "Email telah digunakan",'type' => 'error'), 500];
            return response()->json($response);
        }

        if(User::create([
            'nama' => $request->nama,
            'nomor_telepon' => $request->nomor_telepon,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'alamat' => $request->alamat
        ])) {
            $response = [array('title' => "Success", 'msg'=> "Registrasi Sukses",'type' => 'success'), 200];
        } else {
            $response = [array('title' => "Gagal", 'msg'=> "Registrasi Gagal",'type' => 'error'), 500];
        }
        return response()->json($response);
    }
}
