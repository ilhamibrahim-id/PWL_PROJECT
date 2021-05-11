<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class daftar extends Controller
{
    public function dosen(){
        return view('daftar.dosen');
    }
    public function mahasiswa(){
        return view('daftar.mahasiswa');
    }
    public function admin(){
        return view('daftar.admin');
    }
}
