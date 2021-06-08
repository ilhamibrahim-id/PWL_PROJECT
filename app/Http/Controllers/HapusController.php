<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\DosenMatakuliah;
use App\Models\Kelas;
use App\Models\KelasMatakuliah;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HapusController extends Controller
{
    public function hapus($id)
{
	$username = Mahasiswa::select('nim')->where('id',$id)->first();
	DB::table('table_nilai')->where('mahasiswa_id','=',$id)->delete();
	DB::table('users')->where('username',$username)->delete();
	DB::table('table_mahasiswa')->where('id',$id)->delete();

	return redirect('/main/table_mhs');
}
public function hapusds($id)
{
	$kode = DosenMatakuliah::select('kode_pengajar')->where('dosen_id',$id)->first();
	$username = Dosen::select('nip')->where('id',$id)->first();
	//return $username;
	//return $kode;
	DB::table('table_kelas_matakuliah')->where('kode','=',$kode)->delete();
	DB::table('table_nilai')->where('kode','=',$kode)->delete();
	DB::table('table_dosen_matakuliah')->where('dosen_id','=',$id)->delete();
	DB::table('users')->where('username',$username)->delete();
	DB::table('table_dosen')->where('id',$id)->delete();
	
	return redirect('/main/table_dosen');
}
public function hapusmk($id)
{
	DB::table('table_dosen_matakuliah')->where('matakuliah_id',$id)->delete();
	DB::table('table_kelas_matakuliah')->where('matakuliah_id',$id)->delete();
	DB::table('table_nilai')->where('matakuliah_id',$id)->delete();
	DB::table('table_matakuliah')->where('id',$id)->delete();

	return redirect('/main/table_matakuliah');
}
}
