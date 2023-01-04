<?php

use App\Models\User;
use App\Models\Doctor;
use App\Models\Spesialis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PraktikController;
use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\RegistrasiController;


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

Route::prefix('user')->group(function () {
    Route::get('/', function() {
        return view('user.index',[
            'active' => "dashboard"
        ]);
    })->name('user');

    // Route::get('/jadwal', [JadwalController::class,'index']);

    Route::get('/praktik', [PraktikController::class,'index']);

    Route::get('/spesialis', [SpesialisController::class,'index']);
    Route::get('/spesialis/{id}', [SpesialisController::class,'detail']);
    Route::get('/registrasi/regis/{id}', [RegistrasiController::class,'registrasi']);
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'authenticate']);

Route::get('/register', function() {
    return view('auth.register', [
        'title' => 'Register Page'
    ]);
})->name('register');
Route::post('/register', [AuthController::class,'register']);

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
    })->name("admin");
    Route::get('/spesialis', [SpesialisController::class,'admin']);
    Route::post('/spesialis', [SpesialisController::class,'store'])->name("spesialis.store");
    Route::delete('/spesialis/{id}', [SpesialisController::class,'delete'])->name("spesialis.delete");
    Route::get('/spesialis/edit/{id}', [SpesialisController::class,'edit'])->name("spesialis.edit");
    Route::put('/spesialis/edit/{id}', [SpesialisController::class,'update'])->name("spesialis.update");
    Route::post('/spesialis/edit/{id}', [SpesialisController::class,'update'])->name("spesialis.update");

    Route::get('/doctor', function() {
        $data_doctor = DB::table('tb_doctors')
        ->join('tb_spesialis', 'tb_doctors.id_spesialis', '=', 'tb_spesialis.id_spesialis')
        ->get();

        return view('admin.doctor.index', [
            'active' => 'doctor',
            'data_doctor' => $data_doctor
        ]);
    });
    Route::get('/doctor/create' , [DoctorController::class,'create']);
    Route::get('/doctor/{id}' , [DoctorController::class,'find']);
    Route::post('/doctor/store' , [DoctorController::class,'store']);
    Route::delete('/doctor/{id}', [DoctorController::class,'delete'])->name("doctor.delete");
    Route::get('/doctor/edit/{id}', [DoctorController::class,'edit'])->name("doctor.edit");
    Route::put('/doctor/edit/{id}', [DoctorController::class,'update'])->name("doctor.update");
    Route::post('/doctor/edit/{id}', [DoctorController::class,'update'])->name("doctor.update");

    Route::get('/user', function() {
        $data_user = User::all();

        return view('admin.user.index', [
            'active' => 'user',
            'data_user' => $data_user
        ]);
    });
    Route::get('/user/create' , [UserController::class,'create']);
    Route::post('/user/store' , [UserController::class,'store']);
    Route::delete('/user/{id}', [UserController::class,'delete']);
    Route::get('/user/edit/{id}', [UserController::class,'edit']);
    Route::put('/user/edit/{id}', [UserController::class,'update']);

    Route::get('/jadwal', [JadwalController::class,'admin']);
    Route::post('/jadwal', [JadwalController::class,'store']);
    Route::delete('/jadwal/{id}', [JadwalController::class,'delete']);
    Route::get('/jadwal/edit/{id}', [JadwalController::class,'edit']);
    Route::put('/jadwal/edit/{id}', [JadwalController::class,'update']);

    Route::get('/praktik', [PraktikController::class,'admin']);
    Route::get('/praktik/create' , [PraktikController::class,'create']);
    Route::post('praktik/store', [PraktikController::class,'store']);
});


// Route::get('/admin/spesialis', [SpesialisController::class,'index']);