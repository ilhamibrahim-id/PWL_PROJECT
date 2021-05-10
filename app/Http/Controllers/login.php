<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function dosen(){
        return view('login.dosen');
    }
    public function mahasiswa(){
        return view('login.mahasiswa');
    }
    public function admin(){
        return view('login.admin');
    }
}
