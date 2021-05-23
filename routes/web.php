<?php
use App\Http\Controllers\{main, login, daftar};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('login')->group(function() {
    Route::get('mahasiswa', [login::class, 'index'])->name('login.mahasiswa');
    Route::get('dosen', [login::class, 'index'])->name('login.dosen');
    Route::get('admin', [login::class, 'index'])->name('login.admin');
    Route::post('/', [login::class, 'store'])->name('login');
});

Route::prefix('register')->group(function() {
    Route::get('mahasiswa', [daftar::class, 'index'])->name('register.mahasiswa');
    Route::get('dosen', [daftar::class, 'index'])->name('register.dosen');
    Route::get('admin', [daftar::class, 'index'])->name('register.admin');
    Route::post('/', [daftar::class, 'store'])->name('register');
});

Route::middleware('auth')->prefix('home')->group(function() {
    Route::get('admin', [main::class, 'index'])->name('index.admin');
    Route::get('dosen', [main::class, 'index'])->name('index.dosen');
    Route::get('mahasiswa', [main::class, 'index'])->name('index.mahasiswa');
    Route::post('logout', [main::class, 'logout'])->name('logout');
});