<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;

class RekapsController extends Controller
{
	public function downloadExcel()
	{

		Excel::create('New file', function($excel) {

			$excel->sheet('New sheet', function($sheet) {

				$sheet->loadView('rekap');

			});

		})->download();
	}
}
