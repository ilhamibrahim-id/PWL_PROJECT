<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class daftar extends Controller
{
    public function index()
    {
        $roles = explode('/', url()->current());
        return view('daftar.daftar', ['roles' => end($roles)]);
    }

    public function store(RegisterRequest $request)
    {
        $roles = explode('/', url()->previous());
        $roles = end($roles);

        User::create([
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'role' => $roles,
        ]);

        if ($roles == 'mahasiswa') {
            Mahasiswa::create([
                'nim' => $request['username'],
                'nama' => $request['name'],
                'alamat' => $request['extra'],
                'password' => bcrypt($request['password']),
            ]);
        } else if ($roles == 'dosen') {
            Dosen::create([
                'nip' => $request['username'],
                'nama' => $request['name'],
                'alamat' => $request['extra'],
                'password' => bcrypt($request['password']),
            ]);
        } else {
            Admin::create([
                'username' => $request['username'],
                'nama' => $request['name'],
                'jabatan' => $request['extra'],
                'password' => bcrypt($request['password']),
            ]);
        }

        return redirect('/login/' . $roles)->with('success', 'Data ' . $roles . ' Berhasil terdaftar. Silahkan Login');
    }
}
