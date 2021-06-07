<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasMatakuliah extends Model
{
    use HasFactory;

    protected $table = 'table_kelas_matakuliah';
    protected $fillable = [
        'id',
        'kelas_id',
        'matakuliah_id',
        'kode',
    ];
}
