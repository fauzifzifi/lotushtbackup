<?php

use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\CariController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'kirim'])->middleware('throttle:5,1')->name('kontak.kirim');
Route::get('/cari', [CariController::class, 'index'])->name('cari');
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'proses'])->middleware(['guest', 'throttle:5,1'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('guru', GuruController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});