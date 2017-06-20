<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
	protected $table = 'kompetensi';
	protected $fillable=[
	'karyawan_id',
	'nama_kompetensi', 
	'jenis_kompetensi', 
	'standar', 
	'nilai',
	'gap',
	'unit',
	
	];
}
