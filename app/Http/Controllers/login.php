<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function index()
    {
        $roles = explode('/', url()->current());

        if(Auth::check()) {
            if(end($roles) !== Auth::user()->roles)
                return redirect()->route('index.' . Auth::user()->role);
                
            return redirect()->route('index.' . Auth::user()->role);
        }

        return view('login.login', ['roles' => end($roles)]);
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('index.' . Auth::user()->role);
        }

        return back()->withErrors(['error' => 'Data Tidak Valid']);
    }
}
