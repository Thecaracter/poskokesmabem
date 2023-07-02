<?php

use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProdiController;
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
    return view('welcome');
});

//login routes
Route::post('/masuk', [AuthController::class, 'login'])->name('login');
Route::get('/masuk', [AuthController::class, 'showLoginForm']);

//logout routes
Route::match(['get', 'post'], '/keluar', [AuthController::class, 'logout'])->name('logout');

// Dashboar route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Angkatan route
Route::get('/angkatan', [AngkatanController::class, 'index'])->name('angkatan.index');
Route::post('/angkatan', [AngkatanController::class, 'store'])->name('angkatan.store');
Route::put('/angkatan/{id}', [AngkatanController::class, 'update'])->name('angkatan.update');
Route::delete('/angkatan/{id}', [AngkatanController::class, 'destroy'])->name('angkatan.destroy');

// Jurusan route
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
Route::put('/jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');


// Prodi route
Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
Route::put('/prodi/{id}', [ProdiController::class, 'update'])->name('prodi.update');
Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');