<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\DosenMatakuliah;
use App\Models\Kelas;
use App\Models\KelasMatakuliah;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Nilai;
use Database\Seeders\kelas as SeedersKelas;
use PDF;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function tabel_kelas()
    {
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        $id = $data->select('id')->first();
        $kode = DosenMatakuliah::select('kode_pengajar')->where('dosen_id', '=', $id->id)->get();
        $kelas = MataKuliah::with(['kelas' => function ($q) {
            $q->withCount('mahasiswa')->get();
        }])->paginate(10);
        //return $kode;
        return view('dosen.dosen_table', compact('data', 'kelas', 'kode'));
    }

    public function tabel_nilai()
    {
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        //return $data;
        $id = $data->id;
        //return $kelas;
        $kode = DosenMatakuliah::select('kode_pengajar')->where('dosen_id', '=', $id)->get();
        $kelas = MataKuliah::with('kelas', 'kelas.mahasiswa')->paginate(10);
        //return $kelas;
        // $mahasiswa = Mahasiswa::with('kelas','matakuliah')->where('kelas_id','=',$kelas->kelas_id)->get();
        // // return $mahasiswa;
        $nilai = Nilai::all();
        // return $nilai;
        return view('dosen.dosen_table', compact('data', 'kelas', 'kode', 'nilai'));
    }

    public function detailkelas($id, $kode)
    {
        //return $kode;
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        //$kelas = Mahasiswa::with('kelas','matakuliah')->find($id);
        $kelas = Kelas::with('mahasiswa', 'mahasiswa.matakuliah')->find($id);
        // $nilai = Nilai::select('nilai')->where('kode',$kode);
        // return $nilai;
        //return $kelas;
        return view('dosen.form_nilai', compact('data', 'kelas', 'id', 'kode'));
    }

    public function berinilai($id, $kode, $kelas)
    {
        //return $id;
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        return view('dosen.nilai', compact('data', 'mahasiswa', 'id', 'kode', 'kelas'));
    }

    public function faststore(Request $request)
    {
        //return $request;
        $data = $request->all();
        $nilai = Nilai::all();
        $max = count($data['nilai']);
        //return $max;
        $x = 0;
        foreach ($nilai as $nl) {
            if ($x == $max){
                break;
            }
            if ($nl->mahasiswa_id == $data['id'][$x] && $nl->kode == $data['kode'][$x]) {
                Nilai::where([['mahasiswa_id', $data['id'][$x]], ['kode', $data['kode'][$x]]])->update(['nilai' => $data['nilai'][$x]]);
                $x ++;
            }
        }
        return back()->with('success', 'Nilai Berhasil di inputkan');
    }

    public function cetak()
    {
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        $kode = DosenMatakuliah::where('dosen_id',$data->id)->get();
        $kls = KelasMatakuliah::orderBy('kelas_id','ASC')->get();
        $k = Kelas::all();
        $kelas = Mahasiswa::with('kelas','matakuliah')->orderBy('kelas_id','ASC')->get();
        $nilai = Nilai::all();
        //return $kls;
        $pdf = PDF::loadview('dosen.cetak_nilai', compact('kode', 'kelas', 'kls', 'nilai', 'k'));
        return $pdf->stream();
    }
}
