<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\DosenMatakuliah;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class adminlte extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $mhs = DB::table('table_mahasiswa')->count();
        $ds = DB::table('table_dosen')->count();
        $mk = DB::table('table_matakuliah')->count();
        $k = DB::table('table_kelas')->count();
        return view('main.dashboard', compact('data', 'mhs', 'ds', 'mk', 'k'));
    }

    public function table_kelas()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = Kelas::withCount('mahasiswa')->paginate(5);
        //return $kelas;
        return view('main.table', compact('data', 'kelas'));
    }

    public function table_mhs()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = Mahasiswa::with('kelas', 'matakuliah')->paginate(5);
        //return $kelas;
        return view('main.table', compact('data', 'kelas'));
    }

    public function table_matakuliah()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = DB::table('table_matakuliah')->paginate(5);
        //return $kelas;
        return view('main.table', compact('data', 'kelas'));
    }

    public function table_dosen()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = DB::table('table_dosen')->paginate(5);
        //return $kelas;
        return view('main.table', compact('data', 'kelas'));
    }

    public function table_dosen_matakuliah()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = DB::table('table_dosen_matakuliah')->paginate(5);
        $dosen = Dosen::all();
        $mk = MataKuliah::all();
        //return $kelas;
        return view('main.table', compact('data', 'kelas', 'dosen', 'mk'));
    }

    public function table_kelas_matakuliah()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = DB::table('table_kelas_matakuliah')->paginate(5);
        $kls = Kelas::all();
        $mk = MataKuliah::with('dosen')->get();
        //return $mk;
        return view('main.table', compact('data', 'kelas', 'kls', 'mk'));
    }

    public function detailnilai($id)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        //$kelas = Mahasiswa::with('kelas','matakuliah')->find($id);
        $kelas = Mahasiswa::with('kelas', 'matakuliah.dosen')->find($id);
        //$kelas = Mahasiswa::with('kelas')->with(['matakuliah.dosen' => function($q){
        //    $q->where('kode_pengajar','=', 11 )->first();
        //}])->find($id);
        //return $kelas;
        return view('main.detailnilai', compact('data', 'kelas'));
    }

    public function detailkelas($id)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        //$kelas = Mahasiswa::with('kelas','matakuliah')->find($id);
        $kelas = Kelas::with('mahasiswa')->find($id);

        //return $kelas;
        return view('main.detailkelas', compact('data', 'kelas', 'id'));
    }

    public function edit_kelas($id)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = Mahasiswa::with('kelas')->where('kelas_id', '=', $id)->orWhere('kelas_id', '=', null)->paginate(5);
        $kelas1 = Mahasiswa::count('id');
        //return $kelas;
        return view('main.editkelasmhs', compact('data', 'kelas', 'id', 'kelas1'));
    }

    public function update_kelas(Request $request, $id)
    {
        $data = $request->all();
        $mahasiswa = Mahasiswa::select('nim')->where('kelas_id', '=', $id)->get();
        //return $mahasiswa;
        //return $data;
        if (!$request->has('checkbox')) {
            foreach ($mahasiswa as $mhs) {
                Mahasiswa::where('nim', '=', $mhs->nim)->update(['kelas_id' => null]);
                $mhsid = Mahasiswa::select('id')->where('nim', '=', $mhs->nim)->first();
                DB::table('table_nilai')->where('mahasiswa_id', '=', $mhsid)->delete();
            }
        } else {
            foreach ($mahasiswa as $mhs) {
                foreach ($data['checkbox'] as $item => $value) {
                    if ($mhs->nim == $data['checkbox'][$item]) {
                        Mahasiswa::where('nim', '=', $data['checkbox'][$item])->update(['kelas_id' => $id]);
                    } else {
                        Mahasiswa::where('nim', '=', $mhs->nim)->update(['kelas_id' => null]);
                        $mhsid = Mahasiswa::select('id')->where('nim', '=', $mhs->nim)->first();
                        DB::table('table_nilai')->where('mahasiswa_id', '=', $mhsid)->delete();
                    }
                }
            }
            foreach ($data['checkbox'] as $item => $value) {
                Mahasiswa::where('nim', '=', $data['checkbox'][$item])->update(['kelas_id' => $id]);
            }
        }
        return redirect('main/table_kelas');
    }

    public function form()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        return view('main.form', compact('data'));
    }
    public function password()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        return view('main.form_editpassword', compact('data'));
    }
    public function updatepassword(Request $request)
    {
        if (auth()->user()->role == 'admin') {
            if ($request->password != $request->password1) {
                return back()->withErrors(['error' => 'Password Tidak Sesuai']);
            } else if ($request->password = $request->password1) {
                DB::table('table_admin')->where('username', '=', auth()->user()->username)->update([
                    'password' => $request->password,
                ]);
                DB::table('users')->where('username', '=', auth()->user()->username)->update([
                    'password' => $request->password,
                ]);
            }
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        return view('main.formeditpassword', compact('data'));
    }
}
