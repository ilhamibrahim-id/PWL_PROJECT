<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\DosenMatakuliah;
use App\Models\Kelas;
use App\Models\KelasMatakuliah;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function tabel_kelas()
    {
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        $id = $data->select('id')->first();
        $kode = DosenMatakuliah::select('kode_pengajar')->where('dosen_id','=',$id->id)->get();
        $kelas = MataKuliah::with(['kelas'=> function($q){
            $q->withCount('mahasiswa')->get();
        }])->paginate(5);
        //return $kode;
        return view('dosen.dosen_table', compact('data', 'kelas', 'kode'));
    }

    public function tabel_nilai()
    {
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        //return $data;
        $id = $data->id;
        //return $kelas;
        $kode = DosenMatakuliah::select('kode_pengajar')->where('dosen_id','=',$id)->get();
        $kelas = MataKuliah::with('kelas','kelas.mahasiswa')->paginate(5);
        //return $kelas;
        // $mahasiswa = Mahasiswa::with('kelas','matakuliah')->where('kelas_id','=',$kelas->kelas_id)->get();
        // // return $mahasiswa;
        $nilai = Nilai::all();
        // return $nilai;
        return view('dosen.dosen_table', compact('data', 'kelas', 'kode','nilai'));
    }

    public function detailkelas($id,$kode)
    {
        //return $kode;
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        //$kelas = Mahasiswa::with('kelas','matakuliah')->find($id);
        $kelas = Kelas::with('mahasiswa','mahasiswa.matakuliah')->find($id);
        // $nilai = Nilai::select('nilai')->where('kode',$kode);
        // return $nilai;
        //return $kelas;
        return view('dosen.form_nilai', compact('data', 'kelas', 'id','kode'));
    }

    public function berinilai($id,$kode,$kelas)
    {
        //return $id;
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        $mahasiswa = Mahasiswa::where('id',$id)->first();
        return view('dosen.nilai',compact('data','mahasiswa','id','kode','kelas'));
    }

    public function nilaistore(Request $request)
    {
        //return $request;
        Nilai::where([['mahasiswa_id',$request->id],['kode',$request->kode]])->update(['nilai'=>$request->nilai]);
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        $id = $request->kelas;
        $kode = $request->kode;
        $kelas = Kelas::with('mahasiswa','mahasiswa.matakuliah')->find($id);
        return view('dosen.form_nilai', compact('data', 'kelas', 'id','kode'));
    }
}
