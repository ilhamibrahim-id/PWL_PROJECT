<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\DosenMatakuliah;
use App\Models\Kelas;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function tabel_kelas()
    {
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        $id = $data->select('id')->first();
        $kode = DosenMatakuliah::select('kode_pengajar')->where('dosen_id','=',$id->id)->first();
        $kelas = MataKuliah::with(['kelas'=> function($q){
            $q->withCount('mahasiswa')->get();
        }])->paginate(5);
        //return $kode;
        return view('dosen.dosen_table', compact('data', 'kelas', 'kode'));
    }

    public function tabel_nilai()
    {
        $data = Dosen::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = $data->select('id');
        return $kelas;
    }
}
