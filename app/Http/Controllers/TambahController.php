<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahDsnRequest;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\DosenMatakuliah;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\User;
use App\Http\Requests\TambahMhsRequest;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahController extends Controller
{
    public function tambah()
    {
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = Kelas::all();
        return view('main.form_addmahasiswa', compact('data', 'kelas'));
    }
    public function store(TambahMhsRequest $request)
    {
        //return $request;
        $data = User::where('username', '=', $request['nim'])->first();
        if ($data !== null) {
            return back()->withErrors(['error' => 'Data Sudah Terdaftar']);
        } else {
            DB::table('table_mahasiswa')->insert([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'password' => bcrypt($request['password']),
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
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = MataKuliah::all();
        return view('main.form_addmatakuliah', compact('data', 'kelas'));
    }
    public function storemk(Request $request)
    {
        $data = MataKuliah::where('kode_mk', '=', $request['kode_mk'])->first();
        if ($data !== null) {
            return back()->withErrors(['error' => 'Data Sudah Terdaftar']);
        } else {
            DB::table('table_matakuliah')->insert([
                'kode_mk' => $request->kode_mk,
                'nama_mk' => $request->nama_mk,
                'sks' => $request->sks,
            ]);
            return redirect('/main/table_matakuliah');
        }
    }

    public function tambahds()
    {
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = Dosen::all();
        return view('main.form_adddosen', compact('data', 'kelas'));
    }
    public function storeds(TambahDsnRequest $request)
    {
        $data = User::where('username', '=', $request['nip'])->first();
        if ($data !== null) {
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
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
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
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = Kelas::all();
        $kode = DosenMatakuliah::all();
        return view('main.form_addpelajaran', compact('data', 'kelas', 'kode'));
    }
    public function storepelajaran(Request $request)
    {
        $id = DosenMatakuliah::select('matakuliah_id')->where('kode_pengajar', '=', $request->kode)->first();
        //return $id->matakuliah_id;
        DB::table('table_kelas_matakuliah')->insert([
            'kelas_id' => $request->kelas,
            'matakuliah_id' => $id->matakuliah_id,
            'kode' => $request->kode,
        ]);
        $mahasiswa = Mahasiswa::where('kelas_id', '=',$request->kelas)->get();
        foreach ($mahasiswa as $mhs) {
            $mhsid = Mahasiswa::select('id','kelas_id')->where('nim', '=', $mhs->nim)->first();
            Nilai::create([
                'mahasiswa_id' => $mhsid->id,
                'matakuliah_id' => $id->matakuliah_id,
                'kelas_id' => $mhsid->kelas_id,
                'kode' => $request->kode,
                'nilai' => '0',
            ]);
        }
        return redirect('/main/table_kelas_matakuliah');
    }
}
