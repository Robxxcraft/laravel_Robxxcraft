<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->to('/pasien');
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerForm']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['middleware' => ['auth']], function(){    
    Route::get('/pasien', [PasienController::class, 'index']);
    Route::get('/pasien/tambah', [PasienController::class, 'createForm']);
    Route::post('/pasien/tambah', [PasienController::class, 'create']);
    Route::get('/pasien/edit/{id}', [PasienController::class, 'editForm']);
    Route::put('/pasien/edit/{id}', [PasienController::class, 'update']);
    Route::delete('/pasien/delete/{id}', [PasienController::class, 'destroy']);

    Route::get('/rumah-sakit', [RumahSakitController::class, 'index']);
    Route::get('/rumah-sakit/tambah', [RumahSakitController::class, 'createForm']);
    Route::post('/rumah-sakit/tambah', [RumahSakitController::class, 'create']);
    Route::get('/rumah-sakit/edit/{id}', [RumahSakitController::class, 'editForm']);
    Route::put('/rumah-sakit/update/{id}', [RumahSakitController::class, 'update']);
    Route::delete('/rumah-sakit/delete/{id}', [RumahSakitController::class, 'destroy']);
});