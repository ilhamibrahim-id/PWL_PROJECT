<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class main extends Controller
{
    public function index()
    {
        $roles = explode('/', url()->current());

        if(end($roles) !== Auth::user()->role)
            return redirect()->route('index.' . Auth::user()->role);
        
        return view(end($roles) . '.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
