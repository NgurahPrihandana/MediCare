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
        if(User::create([
            'nama' => $request->nama,
            'nomor_telepon' => $request->nomor_telepon,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'alamat' => $request->alamat
        ])) {
            return redirect()->intended('login');
        } else {
            return redirect()->intended('register');
        }
    }
}
