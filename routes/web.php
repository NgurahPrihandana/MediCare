<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Route::get('/login', function() {
    return view('/auth/login', [
        'title' => 'Login Page'
    ]);
});

// Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', function() {
    return view('/auth/register', [
        'title' => 'Register Page'
    ]);
});

Route::get('/admin', function() {
    return view('admin.index', [
        'active' => 'dashboard'
    ]);
});

Route::get('/admin/spesialis', function() {
    return view('admin.spesialis', [
        'active' => 'spesialis'
    ]);
});