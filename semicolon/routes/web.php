<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CounselingController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\StressLevelController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [LandingController::class, 'index']);

// Authentication Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/counseling', [CounselingController::class, 'index'])->name('counseling');
    Route::post('/counseling', [CounselingController::class, 'store'])->name('post.counseling');
    Route::put('/counseling', [CounselingController::class, 'update'])->name('update.counseling');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('jadwal', JadwalController::class);
    Route::resource('informasi', InformasiController::class);
    Route::resource('stress-level', StressLevelController::class);
    Route::resource('profile', ProfileController::class);

});
