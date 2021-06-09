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
        DB::table('table_mahasiswa')->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
        return redirect('/main/table_mhs');
    }
}
