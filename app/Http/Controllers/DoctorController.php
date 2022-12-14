<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function create() {
        return view('admin.doctor.create', [
            'active' => 'doctor'
        ]);
    }
}
