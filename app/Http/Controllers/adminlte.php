<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class adminlte extends Controller
{
    public function index()
    {
        return view('main.dashboard');
    }
    public function table()
    {
        return view('main.table');
    }
    public function user()
    {
        return view('main.edituser');
    }
}
