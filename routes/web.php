<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::group(['middleware' => ['guest']], function(){
    Route::get('/', [LoginController::class, 'index']);

});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::get('/a', function(){
    return view('Siswa.dashboard');
});


Route::get('auth/google', [LoginController::class, 'redirectGoogle'])->name('auth.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);