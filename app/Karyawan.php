<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable=[
	    'nama', 
	    'nid', 
	    'jabatan', 
	    'grade',
	    'jen_jabatan',
	   
    ];
}
