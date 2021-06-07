<?php
use App\Http\Controllers\{main, login, daftar, adminlte, EUController};
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
    Route::get('table_kelas', [adminlte::class, 'table_kelas'])->name('main.table_kelas');
    Route::get('table_mhs', [adminlte::class, 'table_mhs'])->name('main.table_mhs');
});

Route::middleware(['auth','cekrole:mahasiswa,admin'])->prefix('main')->group(function() {
    Route::get('dashboard', [adminlte::class, 'index'])->name('main.dashboard');
    Route::post('logout', [main::class, 'logout'])->name('logout');
});

Route::middleware(['auth','cekrole:mahasiswa,admin,dosen'])->prefix('main')->group(function() {
    Route::get('dashboard', [adminlte::class, 'index'])->name('main.dashboard');
    Route::get('edituser', [EUController::class, 'index']);
    Route::get('/edituser/edit/{id}',[EUController::class, 'edit']);
    Route::post('/edituser/update',[EUController::class, 'update']);
    Route::get('form', [adminlte::class, 'form'])->name('main.form');
    Route::get('detailnilai/{id}', [adminlte::class, 'detailnilai'])->name('main.detailnilai');
    Route::post('logout', [main::class, 'logout'])->name('logout');
});

