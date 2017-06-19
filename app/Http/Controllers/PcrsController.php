<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kompetensi;
use App\Karyawan;
use App\Pcr;

class PcrsController extends Controller
{
	public function index()
	{
		$pcrs = Pcr::all();
		$pcrs = Pcr::join('kompetensi', 'pcr.kompetensi_id', 'pcr.id')
		->get();
		$karyawans = Pcr::join('karyawan', 'pcr.kompetensi_id', 'karyawan.id' )->
		select('pcr.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.jen_jabatan', 'kompetensi.jen_j')
		->get();

		return view ('kompetensi' compact('kompetensis', 'karyawans'));
	}
}
