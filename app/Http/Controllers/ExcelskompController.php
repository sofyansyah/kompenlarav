<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Kompetensi;
use App\JenisKompetensi;
use App\Karyawan;
use App\Pcr;
use Illuminate\Support\Facades\DB;
use Excel;

class ExcelskompController extends Controller
{
	public function importExport()
	{
		return view('kompetensi');
	}
	public function downloadExcel($type)
	{
		$kompetensis = Kompetensi::get()->toArray();
		return Excel::create('New file', function($excel) {

			$excel->sheet('New sheet', function($sheet) {

				$sheet->loadView('kompetensi.kompetensi', array('kompetensi' => $kompetensis))->export('xls');

			});

	})->download($type);
}
public function importExcel()
{
	if(Input::hasFile('import_file')){
		$path = input::file('import_file')->getRealPath();
		
		$data = Excel::load($path, function($reader){})->get();
		// dd($data);

		if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = [
							'nid' 				=> $value->nid,
							'nama' 				=> $value->nama,
							'jabatan' 			=> $value->jabatan,
							'jenis_kompetensi' 	=> $value->nama_kompetensi,
							'standar' 			=> $value->standar,
							'nilai' 			=> $value->nilai,
							'gap' 				=> $value->gap,
							'unit' 				=> $value->unit,
					];
				}
				if(!empty($insert)){
					DB::table('kompetensi')->insert($insert);
					return redirect()->back()->with('success','Berhasil import data');
				}
			}
		}
	}
}