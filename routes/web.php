<?php
use App\Http\Controllers\{main, login, daftar, adminlte};
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [login::class, 'index']);

Route::get('daftar', [daftar::class, 'daftar']);

Route::prefix('login')->group(function() {
    Route::get('index', [login::class, 'index'])->name('login.main');
    Route::post('/', [login::class, 'store'])->name('login');
});

Route::prefix('register')->group(function() {
    Route::get('mahasiswa', [daftar::class, 'index'])->name('register.mahasiswa');
    Route::get('dosen', [daftar::class, 'index'])->name('register.dosen');
    Route::get('admin', [daftar::class, 'index'])->name('register.admin');
    Route::post('/', [daftar::class, 'store'])->name('register');
});

Route::prefix('main')->group(function() {
    Route::get('dashboard', [adminlte::class, 'index']);
    Route::get('table', [adminlte::class, 'table']);
    Route::get('edituser', [adminlte::class, 'user']);
});

Route::middleware('auth')->prefix('home')->group(function() {
    Route::get('admin', [main::class, 'index'])->name('index.admin');
    Route::get('dosen', [main::class, 'index'])->name('index.dosen');
    Route::get('mahasiswa', [main::class, 'index'])->name('index.mahasiswa');
    Route::post('logout', [main::class, 'logout'])->name('logout');
});



