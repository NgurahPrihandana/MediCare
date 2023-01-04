<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function registrasi($id) {
        return view('user.registrasi.regis', [
            'active' => 'registrasi'
        ]);
    }
}
