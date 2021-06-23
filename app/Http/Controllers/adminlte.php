<?php

namespace App\Http\Controllers;

use App\Http\Requests\GantiPasswdRequest;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\DosenMatakuliah;
use App\Models\Mahasiswa;
use App\Models\User;
use \PDF;
use App\Models\Kelas;
use App\Models\KelasMatakuliah;
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
        $data = null;
        if (auth()->user()->role == 'admin') {
            $data = Admin::where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::where('nim', '=', auth()->user()->username)->first();
        }
        if (auth()->user()->role == 'dosen') {
            $kode = DosenMatakuliah::where('dosen_id', '=', $data->id)->get();
            $dsn = Dosen::with('matakuliah.kelas.mahasiswa')->where('nip', '=', auth()->user()->username)->first();
            $mk = $dsn->matakuliah->count();
            $k = 0;
            $mhs = 0;
            foreach ($dsn->matakuliah as $mak) {
                $k += $mak->kelas->count();
                foreach ($mak->kelas as $kls) {
                    $mhs += $kls->mahasiswa->count();
                }
            }
            //return $mhs;
            return view('dosen.dashboard', compact('data', 'mhs', 'mk', 'k'));
        } else {
            $mhs = DB::table('table_mahasiswa')->count();
            $ds = DB::table('table_dosen')->count();
            $mk = DB::table('table_matakuliah')->count();
            $k = DB::table('table_kelas')->count();
            return view('main.dashboard', compact('data', 'mhs', 'ds', 'mk', 'k'));
        }
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
        $kelas = Kelas::withCount('mahasiswa')->paginate(10);
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
        $kelas = Mahasiswa::with('kelas', 'matakuliah')->paginate(10);
        //return $kelas;
        return view('main.table', compact('data', 'kelas'));
    }

    public function table_matakuliah()
    {
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = DB::table('table_matakuliah')->paginate(10);
        //return $kelas;
        return view('main.table', compact('data', 'kelas'));
    }

    public function table_dosen()
    {
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = DB::table('table_dosen')->paginate(10);
        //return $kelas;
        return view('main.table', compact('data', 'kelas'));
    }

    public function table_dosen_matakuliah()
    {
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = DB::table('table_dosen_matakuliah')->paginate(10);
        $dosen = Dosen::all();
        $mk = MataKuliah::all();
        //return $data;
        return view('main.table_relasi', compact('data', 'kelas', 'dosen', 'mk'));
    }

    public function table_kelas_matakuliah()
    {
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = DB::table('table_kelas_matakuliah')->paginate(10);
        $kls = Kelas::all();
        $mk = MataKuliah::with('dosen')->get();
        //return $data;
        return view('main.table_relasi', compact('data', 'kelas', 'kls', 'mk'));
    }

    public function detailnilai($id)
    {
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
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
        $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        $kelas = Mahasiswa::with('kelas')->where('kelas_id', '=', $id)->orWhere('kelas_id', '=', null)->paginate(10);
        $kelas1 = Mahasiswa::count('id');
        //return $kelas;
        return view('main.editkelasmhs', compact('data', 'kelas', 'id', 'kelas1'));
    }

    public function update_kelas(Request $request, $id)
    {
        $data = $request->all();
        $mahasiswa = Mahasiswa::where('kelas_id', '=', $id)->orWhere('kelas_id', '=', null)->get();
        $matakuliah = KelasMatakuliah::select('matakuliah_id', 'kode')->where('kelas_id', '=', $id)->get();
        $nilai = Nilai::all();
        //return $mahasiswa;
        //return $matakuliah;
        //return $data;
        //return $id;
        if (!$request->has('checkbox')) {
            foreach ($mahasiswa as $mhs) {
                Mahasiswa::where('nim', '=', $mhs->nim)->update(['kelas_id' => null]);
                DB::table('table_nilai')->where('mahasiswa_id', '=', $mhs->id)->delete();
            }
        } else {
            $x = 0;
            foreach ($mahasiswa as $mhs) {
                if ($data['checkbox'] == null) {
                    if ($mhs->kelas_id == $id) {
                        Mahasiswa::where('nim', '=', $mhs->nim)->update(['kelas_id' => null]);
                        $mhsid = Mahasiswa::select('id')->where('nim', '=', $mhs->nim)->first();
                        DB::table('table_nilai')->where('mahasiswa_id', '=', $mhsid->id)->delete();
                    }
                }
                foreach ($data['checkbox'] as $item => $value) {
                    if ($mhs->nim != $data['checkbox'][$item]) {
                        if ($mhs->kelas_id == $id) {
                            Mahasiswa::where('nim', '=', $mhs->nim)->update(['kelas_id' => null]);
                            $mhsid = Mahasiswa::select('id')->where('nim', '=', $mhs->nim)->first();
                            DB::table('table_nilai')->where('mahasiswa_id', '=', $mhsid->id)->delete();
                            break;
                        }
                    } else {
                        if ($mhs->kelas_id == null) {
                            Mahasiswa::where('nim', '=', $data['checkbox'][$item])->update(['kelas_id' => $id]);
                            foreach ($matakuliah as $mk) {
                                Nilai::create([
                                    'mahasiswa_id' => $mhs->id,
                                    'matakuliah_id' => $mk->matakuliah_id,
                                    'kelas_id' => $id,
                                    'kode' => $mk->kode,
                                    'nilai' => '0',
                                ]);
                            }
                        }
                        unset($data['checkbox'][$x]);
                        // return $data['checkbox'];
                        $x++;
                        break;
                    }
                }
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

    public function updatepassword(GantiPasswdRequest $request)
    {
        //return $request;
        //return Hash::check($request->password, Auth::user()->password, []);
        if (Hash::check($request->old_password, Auth::user()->password, [])) {
            if (auth()->user()->role == 'admin') {
                Admin::where('username', '=', auth()->user()->username)->update(['password' => bcrypt($request['password'])]);
            } else if (auth()->user()->role == 'dosen') {
                Dosen::where('nip', '=', auth()->user()->username)->update(['password' => bcrypt($request['password'])]);
            } else {
                Mahasiswa::where('nim', '=', auth()->user()->username)->update(['password' => bcrypt($request['password'])]);
            }
            User::where('username', '=', auth()->user()->username)->update(['password' => bcrypt($request['password'])]);
        } else {
            return back()->withErrors(['error' => 'Password Lama Tidak Sesuai']);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function carimhs(Request $request)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        }
        $keyword = $request->keyword;
        //return $request;
        $kls = Kelas::select('id')->where('nama_kelas', 'like', "%" . $keyword . "%")->first();
        //return $kls;
        //return $kelas;
        if ($kls != null) {

            $kelas = Mahasiswa::with('kelas', 'matakuliah')
                ->where('kelas_id', 'like', "%" . $kls->id . "%")->paginate(10);
        } else {
            $kelas = Mahasiswa::with('kelas', 'matakuliah')
                ->where('nim', 'like', "%" . $keyword . "%")
                ->orWhere('nama', 'like', "%" . $keyword . "%")
                ->orWhere('alamat', 'like', "%" . $keyword . "%")->paginate(10);
        }
        return view('main.table', compact('kelas', 'data'));
    }

    public function carids(Request $request)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'mahasiswa') {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $keyword = $request->keyword;
        $kelas = DB::table('table_dosen')
            ->where('nip', 'like', "%" . $keyword . "%")
            ->orWhere('nama', 'like', "%" . $keyword . "%")
            ->orWhere('alamat', 'like', "%" . $keyword . "%")->paginate(10);
        return view('main.table', compact('kelas', 'data'));
    }

    public function carimk(Request $request)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $keyword = $request->keyword;
        $kelas = DB::table('table_matakuliah')
            ->where('kode_mk', 'like', "%" . $keyword . "%")
            ->orWhere('nama_mk', 'like', "%" . $keyword . "%")
            ->orWhere('sks', 'like', "%" . $keyword . "%")->paginate(10);
        return view('main.table', compact('kelas', 'data'));
    }

    public function cetak_kelas($id)
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else if (auth()->user()->role == 'dosen') {
            $data = Dosen::all()->where('nip', '=', auth()->user()->username)->first();
        } else {
            $data = Mahasiswa::all()->where('nim', '=', auth()->user()->username)->first();
        }
        $kelas = Kelas::with('mahasiswa')->find($id);
        $pdf = PDF::loadview('main.detailkelas_pdf', compact('data', 'kelas', 'id'));
        return $pdf->stream();
    }
}
