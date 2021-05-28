<?php
use App\Http\Controllers\{main, login, daftar, adminlte};
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [login::class, 'index'])->name('/');

Route::prefix('login')->group(function() {
    Route::post('/', [login::class, 'store'])->name('login');
});

Route::prefix('register')->group(function() {
    Route::get('mahasiswa', [daftar::class, 'index'])->name('register.mahasiswa');
    Route::get('dosen', [daftar::class, 'index'])->name('register.dosen');
    Route::get('admin', [daftar::class, 'index'])->name('register.admin');
    Route::post('/', [daftar::class, 'store'])->name('register');
});

Route::middleware(['auth','cekrole:admin'])->prefix('main')->group(function() {
    Route::get('table', [adminlte::class, 'table'])->name('main.table');
});

Route::middleware(['auth','cekrole:mahasiswa,admin'])->prefix('main')->group(function() {
    Route::get('dashboard', [adminlte::class, 'index'])->name('main.dashboard');
    Route::post('logout', [main::class, 'logout'])->name('logout');
});

Route::middleware(['auth','cekrole:mahasiswa,admin,dosen'])->prefix('main')->group(function() {
    Route::get('dashboard', [adminlte::class, 'index'])->name('main.dashboard');
    Route::get('edituser', [adminlte::class, 'user'])->name('main.user');
    Route::get('form', [adminlte::class, 'form'])->name('main.form');
    Route::post('logout', [main::class, 'logout'])->name('logout');
});

