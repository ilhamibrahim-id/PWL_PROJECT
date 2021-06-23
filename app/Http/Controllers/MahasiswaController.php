<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use \PDF;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function tabel_kelas()
    {
        $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        //return $data;
        $kelas = Mahasiswa::with('kelas')->where('kelas_id',$data->kelas_id)->orderBy('nama','ASC')->paginate(10);
        //return $kelas;
        return view('mahasiswa.mahasiswa_table', compact('data', 'kelas'));
    }

    public function tabel_nilai()
    {
        $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        //return $data;
        $kelas = Mahasiswa::with('kelas','matakuliah.dosen')->where('nim', '=', auth()->user()->username)->paginate(10);
        //return $kelas;
        $nilai = Nilai::where('mahasiswa_id',$data->id);
        //return $nilai;
        return view('mahasiswa.mahasiswa_table', compact('data', 'kelas','nilai'));
    }

    public function cetak()
    {
        $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        //return $data;
        $kelas = Mahasiswa::with('kelas','matakuliah')->where('nim', '=', auth()->user()->username)->get();
        //return $kelas;
        $nilai = Nilai::where('mahasiswa_id',$data->id);
        //return $nilai;
        $pdf = PDF::loadview('mahasiswa.cetak_nilai', compact('data', 'kelas','nilai'));
        return $pdf->stream();
    }
}
