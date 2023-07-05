<?php

use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoKosController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LayananAdvokasiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PengurusController;
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

// Route::get('/', function () {
//     return view('landing');
// });
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::post('/landing', [LandingController::class, 'store'])->name('layanan-advokasi.store');
//login routes
Route::post('/masuk', [AuthController::class, 'login'])->name('login');
Route::get('/masuk', [AuthController::class, 'showLoginForm']);

//logout routes
Route::match(['get', 'post'], '/keluar', [AuthController::class, 'logout'])->name('logout');
Route::middleware('isLogin')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Angkatan route
    Route::get('/angkatan', [AngkatanController::class, 'index'])->name('angkatan.index');
    Route::post('/angkatan', [AngkatanController::class, 'store'])->name('angkatan.store');
    Route::put('/angkatan/{id}', [AngkatanController::class, 'update'])->name('angkatan.update');
    Route::delete('/angkatan/{id}', [AngkatanController::class, 'destroy'])->name('angkatan.destroy');

    // Pengurus route
    Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
    Route::post('/pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
    Route::put('/pengurus/{id}', [PengurusController::class, 'update'])->name('pengurus.update');
    Route::delete('/pengurus/{id}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');

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

    // Layanan route
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    // Layanan route
    Route::get('/infokos', [InfoKosController::class, 'index'])->name('infokos.index');
    Route::post('/infokos', [InfoKosController::class, 'store'])->name('infokos.store');
    Route::put('/infokos/{id}', [InfoKosController::class, 'update'])->name('infokos.update');
    Route::delete('/infokos/{id}', [InfoKosController::class, 'destroy'])->name('infokos.destroy');

    // Beasiswa route
    Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('beasiswa.index');
    Route::post('/beasiswa', [BeasiswaController::class, 'store'])->name('beasiswa.store');
    Route::put('/beasiswa/{id}', [BeasiswaController::class, 'update'])->name('beasiswa.update');
    Route::delete('/beasiswa/{id}', [BeasiswaController::class, 'destroy'])->name('beasiswa.destroy');

    // Mitra route
    Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
    Route::post('/mitra', [MitraController::class, 'store'])->name('mitra.store');
    Route::put('/mitra/{id}', [MitraController::class, 'update'])->name('mitra.update');
    Route::delete('/mitra/{id}', [MitraController::class, 'destroy'])->name('mitra.destroy');

    // Layanan Advokasi route
    Route::get('/advokasi', [LayananAdvokasiController::class, 'index'])->name('advokasi.index');
    // Route::post('/advokasi', [LayananAdvokasiController::class, 'store'])->name('advokasi.store');
    // Route::put('/advokasi/{id}', [LayananAdvokasiController::class, 'update'])->name('advokasi.update');
    // Route::delete('/advokasi/{id}', [LayananAdvokasiController::class, 'destroy'])->name('advokasi.destroy');
});