<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('home');
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

    public function postlogin(Request $request){
        if(Auth::attempt(['username'=> $request->username,'password'=> $request->password])){
            return redirect('home');
        }
        return redirect('welcome');
    }

    public function logout(){
        Auth::logout();
        return redirect('welcome');
    }
}
