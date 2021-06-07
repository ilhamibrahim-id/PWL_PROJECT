<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\MataKuliah;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table="table_mahasiswa";
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'foto',
        'password',
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id','id');
    }

    public function matakuliah(){
        return $this->belongsToMany(MataKuliah::class,'table_nilai','mahasiswa_id','matakuliah_id')->withPivot('nilai','kode');
    }
}
