<?php

use App\Http\Controllers\AuthController;
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