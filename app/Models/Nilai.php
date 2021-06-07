<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'table_nilai';
    protected $fillable = [
        'id',
        'mahasiswa_id',
        'matakuliah_id',
        'nilai',
        'kode'
    ];
}
