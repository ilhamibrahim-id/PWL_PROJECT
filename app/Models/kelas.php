<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $table="table_kelas";
    protected $primarykey="id_kelas";
    protected $fillable = [
        'id_kelas',
        'nama_kelas',
    ];
}
