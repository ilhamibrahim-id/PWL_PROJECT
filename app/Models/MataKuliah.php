<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kelas;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'table_matakuliah';
    protected $fillable = [
        'id',
        'kode_mk',
        'nama_mk',
        'sks',
    ];

    public function mahasiswa(){
        return $this->belongsToMany(Mahasiswa::class,'table_nilai','matakuliah_id','mahasiswa_id')->withPivot('nilai','kode','kelas_id');
    }

    public function dosen(){
        return $this->belongsToMany(Dosen::class,'table_dosen_matakuliah','matakuliah_id','dosen_id')->withPivot('kode_pengajar');
    }

    public function kelas(){
        return $this->belongsToMany(Kelas::class,'table_kelas_matakuliah','matakuliah_id','kelas_id')->withPivot('kode');
    }
}
