<?php

use App\Models\Doctor;
use App\Models\Spesialis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpesialisController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.index');
});

Route::get('/login', function() {
    return view('auth.login', [
        'title' => 'Login Page'
    ]);
});

// Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', function() {
    return view('auth.register', [
        'title' => 'Register Page'
    ]);
});

// Route::get('/admin', function() {
//     return view('admin.index', [
//         'active' => 'dashboard'
//     ]);
// });
Route::prefix('admin')->group(function () {

    Route::get('/', function() {
        return view('admin.index', [
            'active' => 'dashboard'
        ]);
    });
    Route::get('/spesialis', function() {
        $data_spesialis = Spesialis::all();
        return view('admin.spesialis', [
            'active' => 'spesialis',
            'data_spesialis' => $data_spesialis
        ]);
    });
    Route::post('/spesialis', [SpesialisController::class,'store'])->name("spesialis.store");
    Route::delete('/spesialis/{id}', [SpesialisController::class,'delete'])->name("spesialis.delete");
    Route::get('/spesialis/edit/{id}', [SpesialisController::class,'edit'])->name("spesialis.edit");
    Route::put('/spesialis/edit/{id}', [SpesialisController::class,'update'])->name("spesialis.update");
    Route::post('/spesialis/edit/{id}', [SpesialisController::class,'update'])->name("spesialis.update");

    Route::get('/doctor', function() {
        $data_doctor = DB::table('doctors')
        ->join('spesialis', 'doctors.id_spesialis', '=', 'spesialis.id')
        ->get();

        return view('admin.doctor.index', [
            'active' => 'doctor',
            'data_doctor' => $data_doctor
        ]);
    });

    Route::get('/doctor/create' , [DoctorController::class,'create']);
    Route::post('/doctor/store' , [DoctorController::class,'store']);
    Route::delete('/doctor/{id}', [DoctorController::class,'delete'])->name("doctor.delete");
    Route::get('/doctor/edit/{id}', [DoctorController::class,'edit'])->name("doctor.edit");
    Route::put('/doctor/edit/{id}', [DoctorController::class,'update'])->name("doctor.update");
    Route::post('/doctor/edit/{id}', [DoctorController::class,'update'])->name("doctor.update");
});


// Route::get('/admin/spesialis', [SpesialisController::class,'index']);