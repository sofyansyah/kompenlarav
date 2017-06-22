<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

use Validator;


class KaryawansController extends Controller
{
	public function index()
	{
		$karyawans = Karyawan::all();
		return view ('karyawan.karyawan', compact('karyawans'));

	}
	public function tambah_karyawan()
	{
		$karyawans  = Karyawan::all();
		return view('karyawan.tambah-karyawan');
	}

	public function post_karyawan(Request $request)
	{
		$karyawan = new Karyawan;
		$karyawan->nama           = $request->nama;
		$karyawan->nid            = $request->nid;
		$karyawan->jabatan        = $request->jabatan;
		$karyawan->grade          = $request->grade;
		$karyawan->jen_jabatan    = $request->jen_jabatan;
		$validator = Validator::make($request->all(), [
			'nama'           => 'required',
			'nid'            => 'required',
			'jabatan'        => 'required',
			'grade'          => 'required',
			'jen_jabatan'    => 'required',
			]);

		if ($validator->fails()) {
			return redirect('karyawan/create')
			->withErrors($validator)
			->withInput();
		}

		$karyawan->save();
		 return redirect()->back()->with('success','Berhasil tambah');
	}

	public function edit_karyawan($id)
	{
		$karyawan = Karyawan::where('karyawan.id', $id)
		->first();
		return view ('karyawan.edit_karyawan' , compact('karyawan')); 
	}


	public function editpost_karyawan(Request $request, $id)
	{

		$karyawan = Karyawan::where('karyawan.id', $id)->first();
		$karyawan->update($request->all());
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function hapus_karyawan($id)
	{
		$karyawan = Karyawan::where('karyawan.id', $id)->first();
		$karyawan->delete();
		return redirect('/karyawan');
	}

}



