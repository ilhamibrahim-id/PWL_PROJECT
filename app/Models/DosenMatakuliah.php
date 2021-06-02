<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenMatakuliah extends Model
{
    use HasFactory;

    protected $table = 'table_dosen_matakuliah';
    protected $fillable = [
        'id',
        'dosen_id',
        'matakuliah_id'
    ];
}
