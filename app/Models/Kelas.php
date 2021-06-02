<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class Kelas extends Model
{
    use HasFactory;
    protected $table="table_kelas";
    protected $fillable = [
        'id_kelas',
        'nama_kelas',
    ];

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class);
    }

    public function matakuliah(){
        return $this->belongsToMany(MataKuliah::class,'table_kelas_matakuliah','matakuliah_id','kelas_id');
    }
}
