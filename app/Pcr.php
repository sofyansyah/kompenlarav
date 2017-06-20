<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcr extends Model
{
	protected $table = 'pcr';
	protected $fillable=[
	'kompetensi_id',
	'karyawan_id',
	'sem_1', 
	'readliness', 
	'sem_2', 
	'pcr',
	
	];
}
