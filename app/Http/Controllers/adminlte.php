<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminlte extends Controller
{
    public function index()
    {
        return view('main.dashboard');
    }
    public function table()
    {
        $data = DB::table('table_mahasiswa')
    ->selectRaw('count(kelas) as k')
    ->where('kelas', '<>', 1)
    ->groupBy('kelas')
    ->get();
        $kelas = DB::table('table_kelas')->paginate(5);
        return view('main.table',['kelas' => $kelas],['kelas_count' => $data]);
    }
    public function user()
    {
        if(auth()->user()->role == 'admin'){
            $data = Admin::all()->where('username','=',auth()->user()->username)->first();
        } else if(auth()->user()->role == 'dosen'){
            $data = Dosen::all()->where('nip','=',auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim','=',auth()->user()->username)->first();
        }
        return view('main.edituser',compact('data'));
    }
    public function form()
    {
        return view('main.form');
    }
}
