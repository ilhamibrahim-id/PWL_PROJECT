<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [login::class, 'welcome']);
Route::prefix('login')->group(function () {
    Route::get('/dosen', [login::class, 'dosen']);
    Route::get('/mahasiswa', [login::class, 'mahasiswa']);
    Route::get('/admin', [login::class, 'admin']);
});
Route::prefix('daftar')->group(function () {
    Route::get('/dosen', [daftar::class, 'dosen']);
    Route::get('/mahasiswa', [daftar::class, 'mahasiswa']);
    Route::get('/admin', [daftar::class, 'admin']);
});
Route::post('postlogin', [login::class, 'postlogin'])->name('postlogin');
Route::get('logout', [login::class, 'logout'])->name('logout');
Route::middleware(['auth', 'cekrole:admin'])->group(function () {
    Route::get('/admin', [main::class, 'admin']);
});
Route::middleware(['auth', 'cekrole:admin,dosen'])->group(function () {
    Route::get('/nilai', [main::class, 'nilai']);
    Route::get('/datadiri', [main::class, 'datadiri']);
    Route::get('/home', [login::class, 'home']);
});
Route::middleware(['auth', 'cekrole:admin,mahasiswa'])->group(function () {
    Route::get('/nilai', [main::class, 'nilai']);
    Route::get('/datadiri', [main::class, 'datadiri']);
    Route::get('/cetak', [main::class, 'cetak']);
    Route::get('/home', [login::class, 'home']);
});