<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use Auth;
use Validator;


class KaryawansController extends Controller
{
	public function index()
	{
		$karyawans = Karyawan::all();
		return view ('karyawan', compact('karyawans'));

	}
	public function create()
	{
		return view('create');
	}

	public function store(Request $request)
	{
		$karyawan = new Karyawan;
		$karyawan->nama= $request->nama;
		$karyawan->nid= $request->nid;
		$karyawan->jabatan= $request->jabatan;
		$karyawan->grade= $request->grade;
		$karyawan->jen_jabatan= $request->jen_jabatan;
		$validator = Validator::make($request->all(), [
			'nama' => 'required',
			'nid' => 'required',
			'jabatan' => 'required',
			'grade' => 'required',
			'jen_jabatan' => 'required',
			]);

		if ($validator->fails()) {
			return redirect('karyawan/create')
			->withErrors($validator)
			->withInput();
		}

		$karyawan->save();
		return redirect ('karyawan');
	}

	public function edit($id)
	{
		$karyawan = Karyawan::where('karyawan.id', $id)
		->first();

		return view ('edit-karyawan' , compact('karyawan')); 
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    	$karyawan = Karyawan::where('karyawan.id', $id)
    	->first();
    	$karyawan->update($request->all());
    	return redirect('karyawan');
    }

    public function show($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    	$karyawan = Karyawan::where('karyawan.id', $id)
    	->first();

    	$karyawan->delete();
    	return redirect('/karyawan');
    }
}


