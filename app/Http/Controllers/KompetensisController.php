<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kompetensi;
use App\Karyawan;

class KompetensisController extends Controller
{
	public function index()
	{
		$kompetensis = Kompetensi::all();
		$kompentsis = Kompetensi::join('karyawan', 'kompetensi.karyawan_id', 'karyawan.id' )->
		select('kompetensi.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.nid')
		->get();
		return view ('kompetensi' compact('kompetensis'));
	}
}
