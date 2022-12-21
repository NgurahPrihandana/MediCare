<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index() {
        return view('user.jadwal.index',[
            'active' => 'jadwal'
        ]);
    }
}
