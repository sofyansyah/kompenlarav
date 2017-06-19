<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class KaryawansController extends Controller
{
	public function index()
	{
		$karyawans = Karyawan::all();
			return view ('karyawan', compact('karyawans'));
			Dd($karyawans);
	}
		
}


