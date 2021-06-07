<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminlte extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $data = Admin::all()->where('username','=',auth()->user()->username)->first();
        } else if(auth()->user()->role == 'dosen'){
            $data = Dosen::all()->where('nip','=',auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim','=',auth()->user()->username)->first();
        }
        return view('main.dashboard',compact('data'));
    }
    public function table_kelas()
    {
        if(auth()->user()->role == 'admin'){
            $data = Admin::all()->where('username','=',auth()->user()->username)->first();
        } else if(auth()->user()->role == 'dosen'){
            $data = Dosen::all()->where('nip','=',auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim','=',auth()->user()->username)->first();
        }
        $kelas = Kelas::withCount('mahasiswa')->paginate(5);
        //return $kelas;
        return view('main.table',compact('data','kelas'));
    }
    public function table_mhs()
    {
        if(auth()->user()->role == 'admin'){
            $data = Admin::all()->where('username','=',auth()->user()->username)->first();
        } else if(auth()->user()->role == 'dosen'){
            $data = Dosen::all()->where('nip','=',auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim','=',auth()->user()->username)->first();
        }
        $kelas = Mahasiswa::with('kelas','matakuliah')->paginate(5);
        //return $kelas;
        return view('main.table',compact('data','kelas'));
    }
    public function detailnilai($id){
        if(auth()->user()->role == 'admin'){
            $data = Admin::all()->where('username','=',auth()->user()->username)->first();
        } else if(auth()->user()->role == 'dosen'){
            $data = Dosen::all()->where('nip','=',auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim','=',auth()->user()->username)->first();
        }
        //$kelas = Mahasiswa::with('kelas','matakuliah')->find($id);
         $kelas = Mahasiswa::with('kelas','matakuliah.dosen')->find($id);
        //$kelas = Mahasiswa::with('kelas')->with(['matakuliah.dosen' => function($q){
        //    $q->where('kode_pengajar','=', 11 )->first();
        //}])->find($id);
        //return $kelas;
        return view('main.detailnilai',compact('data','kelas'));
    }
    public function detailkelas($id){
        if(auth()->user()->role == 'admin'){
            $data = Admin::all()->where('username','=',auth()->user()->username)->first();
        } else if(auth()->user()->role == 'dosen'){
            $data = Dosen::all()->where('nip','=',auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim','=',auth()->user()->username)->first();
        }
        //$kelas = Mahasiswa::with('kelas','matakuliah')->find($id);
        $kelas = Kelas::with('mahasiswa')->find($id);
        //return $kelas;
        return view('main.detailkelas',compact('data','kelas'));
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
        if(auth()->user()->role == 'admin'){
            $data = Admin::all()->where('username','=',auth()->user()->username)->first();
        } else if(auth()->user()->role == 'dosen'){
            $data = Dosen::all()->where('nip','=',auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim','=',auth()->user()->username)->first();
        }
        return view('main.form',compact('data'));

    }
}
