<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//----------Guest Route----------
Route::group(['middleware' => ['guest']], function(){
    Route::get('/', [LoginController::class, 'index']);
});
//----------Guest Route----------

//----------Universal Auth Route----------
Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout', [LoginController::class, 'logout']);
    });
//----------Universal Auth Route----------


//----------Guru Route----------
Route::group(['middleware' => ['guru']], function(){
    Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('dashboard');
    Route::get('/perusahaan', [GuruController::class, 'perusahaan']);
    Route::get('/siswa', [GuruController::class, 'siswa']);
});
//----------Guru Route----------


//----------Siswa Route----------
Route::group(['middleware' => ['siswa']], function(){
    Route::get('/home', [SiswaController::class, 'index'])->name('home');
    Route::get('/create', [SiswaController::class, 'create']);
});
//----------Siswa Route----------


//----------Google Route----------
Route::get('auth/google', [LoginController::class, 'redirectGoogle'])->name('auth.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
//----------Google Route----------