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
