<?php
use App\Http\Controllers\{main, login, daftar, adminlte, DosenController, EUController, TambahController,HapusController,EditController,MahasiswaController};
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
    Route::get('cetak_detailkelas/{id}', [adminlte::class, 'cetak_kelas'])->name('cetak_detailkelas');
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
    Route::get('/pengajar/hapus/{id}',[HapusController::class, 'hapuspengajar']);
    Route::get('/pelajaran/hapus/{id}/{kode}',[HapusController::class, 'hapuspelajaran']);
    Route::get('/mahasiswa/edit/{id}',[EditController::class, 'edit']);
    Route::post('/mahasiswa/update',[EditController::class, 'update']);
    Route::get('/matakuliah/edit/{id}',[EditController::class, 'editmk']);
    Route::post('/matakuliah/update',[EditController::class, 'updatemk']);
    Route::get('/dosen/edit/{id}',[EditController::class, 'editds']);
    Route::post('/dosen/update',[EditController::class, 'updateds']);
    Route::get('/carimhs',[adminlte::class,'carimhs']);
    Route::get('/carids',[adminlte::class,'carids']);
    Route::get('/carimk',[adminlte::class,'carimk']);
    Route::get('detailnilai/{id}', [adminlte::class, 'detailnilai'])->name('main.detailnilai');
});

Route::middleware(['auth','cekrole:mahasiswa'])->prefix('mahasiswa')->group(function() {
    Route::get('kelas', [MahasiswaController::class, 'tabel_kelas'])->name('mahasiswa.kelas');
    Route::get('nilai', [MahasiswaController::class, 'tabel_nilai'])->name('mahasiswa.nilai');
    Route::get('matakuliah', [MahasiswaController::class, 'tabel_matakuliah'])->name('mahasiswa.matakuliah');
    Route::get('cetak', [MahasiswaController::class, 'cetak'])->name('cetak');
});

Route::middleware(['auth','cekrole:dosen,admin'])->prefix('main')->group(function() {
    Route::get('detailkelas/{id}', [adminlte::class, 'detailkelas'])->name('main.detailkelas');
});

Route::middleware(['auth','cekrole:dosen'])->prefix('dosen')->group(function() {
    Route::get('kelas', [DosenController::class, 'tabel_kelas'])->name('dosen.kelas');
    Route::get('nilai', [DosenController::class, 'tabel_nilai'])->name('dosen.nilai');
    Route::get('detailkelas/{id}/{kode}', [DosenController::class, 'detailkelas'])->name('dosen.detailkelas');
    Route::get('berinilai/{id}/{kode}/{kelas}', [DosenController::class, 'berinilai'])->name('dosen.berinilai');
    Route::post('nilai/store', [DosenController::class, 'nilaistore'])->name('dosen.nilaistore');
});

Route::middleware(['auth','cekrole:mahasiswa,admin,dosen'])->prefix('main')->group(function() {
    Route::get('dashboard', [adminlte::class, 'index'])->name('main.dashboard');
    Route::get('gantipassword', [adminlte::class, 'password'])->name('main.password');
    Route::post('/gantipassword/store',[adminlte::class, 'updatepassword']);
    Route::get('edituser', [EUController::class, 'index']);
    Route::get('/edituser/edit/{id}',[EUController::class, 'edit']);
    Route::post('/edituser/update',[EUController::class, 'update']);
    Route::get('form', [adminlte::class, 'form'])->name('main.form');
    Route::post('logout', [main::class, 'logout'])->name('logout');
    Route::get('image', [adminlte::class, 'indeximg']);
    Route::post('image', [adminlte::class, 'saveimg']);
});

