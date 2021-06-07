<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MataKuliah;

class Dosen extends Model
{
    use HasFactory;

    protected $table="table_dosen";
    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'password',
    ];

    public function matakuliah(){
        return $this->belongsToMany(MataKuliah::class,'table_dosen_matakuliah','dosen_id','matakuliah_id')->withPivot('kode_pengajar');
    }
}
