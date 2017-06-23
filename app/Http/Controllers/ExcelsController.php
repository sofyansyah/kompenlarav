<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Karyawan;
use Illuminate\Support\Facades\DB;
use Excel;
use User;

class ExcelsController extends Controller
{
	public function importExport()
	{
		return view('karyawan');
	}
	public function downloadExcel($type)
	{
		
		$data = Karyawan::get()->toArray();
		return Excel::create('Data_Karyawan', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });

		})->download($type);
	}
	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['nama' => $value->nama,
					 'nid' => $value->nid,
					 'jabatan' => $value->jabatan,
					 'grade' => $value->grade,
					 'jen_jabatan' => $value->jenjang_jabatan,
					 ];
					 $inserts[] = ['namalengkap' => $value->namalengkap,
					 ];
				}
				if(!empty($insert)){
					DB::table('karyawan')->insert($insert);
					DB::table('tes')->insert($inserts);
					return redirect()->back()->with('success','Berhasil import data');
				}
			}
		}
	}
}

