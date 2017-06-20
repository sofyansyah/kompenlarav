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
		$pcrs = Pcr::join('kompetensi', 'pcr.kompetensi_id', 'kompetensi.id')
					->join('karyawan', 'pcr.karyawan_id', 'karyawan.id' )
					->join('jenis_kompetensi', 'kompetensi.jenis_kompetensi', 'jenis_kompetensi.id' )
					->select('pcr.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.jen_jabatan', 'jenis_kompetensi.nama as nama_kompetensi', 'kompetensi.jenis_kompetensi','kompetensi.standar')
					->get();

					// dd($pcrs);

		return view ('pcr', compact('pcrs'));
	}
}
