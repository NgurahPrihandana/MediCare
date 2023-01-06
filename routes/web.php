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

Route::group(['middleware' => ['auth','role:user']], function() {
    Route::prefix('user')->group(function () {
        Route::get('/', function() {
            $jumlah_spesialis = DB::table('tb_spesialis')
            ->select(DB::raw('count(tb_spesialis.id_spesialis) as jumlah_spesialis'))
            ->first();
    
            $jumlah_dokter = DB::table('tb_doctors')
            ->select(DB::raw('count(tb_doctors.doctor_id) as jumlah_dokter'))
            ->first();
            
            $jumlah_praktik = DB::table('tb_praktik')
            ->select(DB::raw('count(tb_praktik.id_praktik) as jumlah_praktik'))
            ->first();
    
            $jumlah_registrasi = DB::table('tb_registrasi')
            ->select(DB::raw('count(tb_registrasi.id_registrasi) as jumlah_registrasi'))
            ->first();
    
            return view('user.index',[
                'active' => "dashboard",
                'jumlah_spesialis' => $jumlah_spesialis,
                'jumlah_dokter' => $jumlah_dokter,
                'jumlah_praktik' => $jumlah_praktik,
                'jumlah_registrasi' => $jumlah_registrasi
            ]);
        })->name('user');
    
        // Route::get('/jadwal', [JadwalController::class,'index']);
    
        Route::get('/booking', [PraktikController::class,'index']);
    
        Route::get('/spesialis', [SpesialisController::class,'index']);
        Route::get('/spesialis/{id}', [SpesialisController::class,'detail']);
        Route::get('/spesialis/{id}', [SpesialisController::class,'detail']);
        Route::get('/registrasi/regis/{id}', [RegistrasiController::class,'registrasi']);
        Route::post('/registrasi/regis/store', [RegistrasiController::class,'store']);

        Route::get('/registrasi', [RegistrasiController::class,'index']);
        Route::get('/registrasi/detail/{id}',[RegistrasiController::class,'detail_registrasi']);
    });
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'authenticate']);
Route::get('logout', [AuthController::class,'logout']);

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
// Route::prefix('doctor')->group(function () {
//     Route::get('/', function() {
//         return view('doctor.index', [
//             'active' => 'dashboard'
//         ]);
//     })->name("doctor");
// });

Route::group(['middleware' => ['auth','role:admin']], function() {
    Route::prefix('admin')->group(function () {
        Route::get('/', function() {
            $jumlah_spesialis = DB::table('tb_spesialis')
            ->select(DB::raw('count(tb_spesialis.id_spesialis) as jumlah_spesialis'))
            ->first();
    
            $jumlah_dokter = DB::table('tb_doctors')
            ->select(DB::raw('count(tb_doctors.doctor_id) as jumlah_dokter'))
            ->first();
            
            $jumlah_praktik = DB::table('tb_praktik')
            ->select(DB::raw('count(tb_praktik.id_praktik) as jumlah_praktik'))
            ->first();
    
            $jumlah_registrasi = DB::table('tb_registrasi')
            ->select(DB::raw('count(tb_registrasi.id_registrasi) as jumlah_registrasi'))
            ->first();
    
            return view('admin.index', [
                'active' => 'dashboard',
                'jumlah_spesialis' => $jumlah_spesialis,
                'jumlah_dokter' => $jumlah_dokter,
                'jumlah_praktik' => $jumlah_praktik,
                'jumlah_registrasi' => $jumlah_registrasi
            ]);
        })->name("admin");
        Route::get('/spesialis', [SpesialisController::class,'admin']);
        Route::post('/spesialis', [SpesialisController::class,'store'])->name("spesialis.store");
        Route::delete('/spesialis/{id}', [SpesialisController::class,'delete'])->name("spesialis.delete");
        Route::get('/spesialis/detail/{id}', [SpesialisController::class,'admin_detail'])->name("spesialis.detail");
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
        Route::get('/doctor/detail/{id}' , [DoctorController::class,'detail']);
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
        Route::get('/praktik/edit/{id}',[PraktikController::class,'edit']);
        Route::put('/praktik/edit/{id}', [PraktikController::class,'update']);
        Route::delete('/praktik/{id}', [PraktikController::class,'delete']);
    
        Route::get('/registrasi',[RegistrasiController::class,'admin']);
        Route::get('/registrasi/detail/{id}',[RegistrasiController::class,'detail_spesialis']);
    });
});


// Route::get('/admin/spesialis', [SpesialisController::class,'index']);