<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\DosenMatakuliah;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\User;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit($id)
{
    if (auth()->user()->role == 'admin') {
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
    } else if (auth()->user()->role == 'dosen') {
        $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
    } else {
        $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
    }
	$mhs = DB::table('table_mahasiswa')->where('id',$id)->get();
    $kelas = Kelas::all();
	return view('main.form_editmahasiswa',compact('mhs','kelas','data'));

}
public function update(Request $request)
{
    DB::table('table_mahasiswa')->where('id',$request->id)->update([
		'nama' => $request->nama,
		'alamat' => $request->alamat,
	]);
        return redirect('/main/table_mhs');
    }
    public function editmk($id)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $mk = DB::table('table_matakuliah')->where('id',$id)->get();
        return view('main.form_editmatakuliah',compact('data','mk'));

    }
    public function updatemk(Request $request)
    {
        DB::table('table_matakuliah')->where('id',$request->id)->update([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
        ]);
            return redirect('/main/table_matakuliah');
        }

        public function editds($id)
        {
            if (auth()->user()->role == 'admin') {
                $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
            } else if (auth()->user()->role == 'dosen') {
                $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
            } else {
                $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
            }
            $ds = DB::table('table_dosen')->where('id',$id)->get();
            return view('main.form_editdosen',compact('data','ds'));

        }
        public function updateds(Request $request)
        {
            DB::table('table_dosen')->where('id',$request->id)->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]);
                return redirect('/main/table_dosen');
            }
}
