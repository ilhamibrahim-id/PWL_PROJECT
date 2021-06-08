<?php
use App\Http\Controllers\{main, login, daftar, adminlte, EUController, TambahController,HapusController};
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
    Route::get('edit_kelas/{id}', [adminlte::class, 'edit_kelas'])->name('main.edit_kelas');
    Route::post('update/{id}', [adminlte::class, 'update_kelas'])->name('main.update_kelas');
    Route::get('table_dosen', [adminlte::class, 'table_dosen'])->name('main.table_dosen');
    Route::get('table_matakuliah', [adminlte::class, 'table_matakuliah'])->name('main.table_matakuliah');
    Route::get('table_dosen_matakuliah', [adminlte::class, 'table_dosen_matakuliah'])->name('main.table_dosen_matakuliah');
    Route::get('table_kelas_matakuliah', [adminlte::class, 'table_kelas_matakuliah'])->name('main.table_kelas_matakuliah');
    Route::get('/mahasiswa/tambah',[TambahController::class, 'tambah']);
    Route::post('/mahasiswa/store',[TambahController::class, 'store']);
    Route::get('/matakuliah/tambah',[TambahController::class, 'tambahmk']);
    Route::post('/matakuliah/store',[TambahController::class, 'storemk']);
    Route::get('/dosen/tambah',[TambahController::class, 'tambahds']);
    Route::post('/dosen/store',[TambahController::class, 'storeds']);
    Route::get('/dosen_mk/tambah',[TambahController::class, 'tambahpengajar']);
    Route::post('/dosen_mk/store',[TambahController::class, 'storepengajar']);
    Route::get('/pelajaran/tambah',[TambahController::class, 'tambahpelajaran']);
    Route::post('/pelajaran/store',[TambahController::class, 'storepelajaran']);
    Route::get('/mahasiswa/hapus/{id}',[HapusController::class, 'hapus']);
    Route::get('/dosen/hapus/{id}',[HapusController::class, 'hapusds']);
    Route::get('/matakuliah/hapus/{id}',[HapusController::class, 'hapusmk']);
});

Route::middleware(['auth','cekrole:mahasiswa,admin'])->prefix('main')->group(function() {

});

Route::middleware(['auth','cekrole:dosen,admin'])->prefix('main')->group(function() {
    Route::get('detailkelas/{id}', [adminlte::class, 'detailkelas'])->name('main.detailkelas');
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

