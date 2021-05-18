<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class main extends Controller
{
    public function nilai()
    {
        return view('main.nilai');
    }
    public function datadiri(){
        return view('main.datadiri');
    }
    public function cetak(){
        return view('main.cetak');
    }
    public function admin(){
        return view('main.admin');
    }
}
