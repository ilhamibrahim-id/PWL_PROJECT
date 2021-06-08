<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HapusController extends Controller
{
    public function hapus($id)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('table_mahasiswa')->where('id',$id)->delete();

	return redirect('/main/table_mhs');
}
public function hapusds($id)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('table_dosen')->where('id',$id)->delete();

	return redirect('/main/table_dosen');
}
}
