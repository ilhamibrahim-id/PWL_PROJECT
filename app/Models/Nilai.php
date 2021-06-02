<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $tanle = 'table_nilai';
    protected $fillable = [
        'id',
        'mahasiswa_id',
        'matakuliah_id',
        'nilai'
    ];
}
