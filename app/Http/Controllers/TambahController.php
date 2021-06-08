<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\DosenMatakuliah;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahController extends Controller
{
    public function tambah()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = Kelas::all();
        return view('main.form_addmahasiswa', compact('data', 'kelas'));
    }
    public function store(Request $request)
    {
        //return $request;
        $data = User::where('username','=', $request['nim'])->first();
        if ($data !== null){
            return back()->withErrors(['error' => 'Data Sudah Terdaftar']);
        } else {
            DB::table('table_mahasiswa')->insert([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'password' => bcrypt($request['password']),
                'kelas_id' => $request->kelas,
            ]);
            DB::table('users')->insert([
                'username' => $request->nim,
                'password' => bcrypt($request['password']),
                'role' => 'mahasiswa',
            ]);
            return redirect('/main/table_mhs');
        }
    }

    public function tambahmk()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = MataKuliah::all();
        return view('main.form_addmatakuliah', compact('data', 'kelas'));
    }
    public function storemk(Request $request)
    {
        DB::table('table_matakuliah')->insert([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
        ]);
        return redirect('/main/table_matakuliah');
    }

    public function tambahds()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = Dosen::all();
        return view('main.form_adddosen', compact('data', 'kelas'));
    }
    public function storeds(Request $request)
    {
        $data = User::where('username','=', $request['nip'])->first();
        if ($data !== null){
            return back()->withErrors(['error' => 'Data Sudah Terdaftar']);
        } else {
            DB::table('table_dosen')->insert([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'password' => bcrypt($request['password']),
            ]);
            DB::table('users')->insert([
                'username' => $request->nip,
                'password' => bcrypt($request['password']),
                'role' => 'dosen',
            ]);
            return redirect('/main/table_dosen');
        }
    }

    public function tambahpengajar()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $dosen = Dosen::all();
        $matakuliah = MataKuliah::all();
        return view('main.form_adddosenmatakuliah', compact('data', 'dosen', 'matakuliah'));
    }
    public function storepengajar(Request $request)
    {
        DB::table('table_dosen_matakuliah')->insert([
            'dosen_id' => $request->nama,
            'matakuliah_id' => $request->mk,
            'kode_pengajar' => $request->kode,
        ]);
        return redirect('/main/table_dosen_matakuliah');
    }

    public function tambahpelajaran()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = Kelas::all();
        $kode = DosenMatakuliah::all();
        return view('main.form_addpelajaran', compact('data', 'kelas', 'kode'));
    }
    public function storepelajaran(Request $request)
    {
        $id = DosenMatakuliah::select('matakuliah_id')->where('kode_pengajar','=',$request->kode)->first();
        //return $id;
        DB::table('table_kelas_matakuliah')->insert([
            'kelas_id' => $request->kelas,
            'matakuliah_id' => $id->value,
            'kode' => $request->kode,
        ]);
        return redirect('/main/table_kelas_matakuliah');
    }
}
