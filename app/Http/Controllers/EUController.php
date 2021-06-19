<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\EU;
use App\Models\User;
use App\Models\Kelas;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        return view('main.edituser', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EU  $eU
     * @return \Illuminate\Http\Response
     */
    public function show(EU $eU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EU  $eU
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        return view('main.edituser', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EU  $eU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        if ($request->file('image') == '') {
            if (auth()->user()->role == 'admin') {
                DB::table('table_admin')->where('username', '=', auth()->user()->username)->update([
                    'username' => $request->username,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                ]);
            } else if (auth()->user()->role == 'dosen') {
                DB::table('table_dosen')->where('nip', '=', auth()->user()->username)->update([
                    'nip' => $request->username,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                ]);
            } else {
                DB::table('table_mahasiswa')->where('nim', '=', auth()->user()->username)->update([
                    'nim' => $request->username,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                ]);
            }
            DB::table('users')->where('username', '=', auth()->user()->username)->update([
                'username' => $request->username,
            ]);
        } else {
            if ($data->foto && file_exists(storage_path('app/public/' . $data->foto))) {
                Storage::delete('public/' . $data->foto);
            }

            $image_name = $request->file('image')->store('images', 'public');
            $data->foto = $image_name;

            $data->save();
            if (auth()->user()->role == 'admin') {
                DB::table('table_admin')->where('username', '=', auth()->user()->username)->update([
                    'username' => $request->username,
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                ]);
            } else if (auth()->user()->role == 'dosen') {
                DB::table('table_dosen')->where('nip', '=', auth()->user()->username)->update([
                    'nip' => $request->username,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                ]);
            } else {
                DB::table('table_mahasiswa')->where('nim', '=', auth()->user()->username)->update([
                    'nim' => $request->username,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                ]);
            }
            DB::table('users')->where('username', '=', auth()->user()->username)->update([
                'username' => $request->username,
            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EU  $eU
     * @return \Illuminate\Http\Response
     */
    public function destroy(EU $eU)
    {
        //
    }
}
