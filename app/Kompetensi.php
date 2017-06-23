<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
	protected $table = 'kompetensi';

	protected $fillable=[
		'karyawan_id',
		'jenis_kompetensi', 
		'standar', 
		'nilai',
		'gap',
		'unit',
		'sem1',
		'sem2',
		'readlines',
	];
}
