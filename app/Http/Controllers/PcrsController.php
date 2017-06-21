<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kompetensi;
use App\Karyawan;
use App\Pcr;

class PcrsController extends Controller
{
	public function index()
	{
		$pcr = Pcr::join('karyawan', 'pcr.karyawan_id', 'karyawan.id' )
		->select('pcr.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.nid')
		->get();
		return view ('pcr.index',compact('pcr'));
	}
	public function editpcr($id)
	{
		$pcr = Pcr::join('karyawan', 'pcr.karyawan_id', 'karyawan.id' )
		->select('pcr.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.jen_jabatan','karyawan.nid')
		->where('pcr.id',$id)
		->first();

		$komp = Kompetensi::where('karyawan_id',$pcr->karyawan_id)
		->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')
		->select('kompetensi.standar','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.jenis_kompetensi','jenis_kompetensi.no','kompetensi.id','jenis_kompetensi.nama','jenis_kompetensi.type')
		->get();

		$inti 	= Kompetensi::where('karyawan_id',$pcr->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','inti')->get();
		$peran 	= Kompetensi::where('karyawan_id',$pcr->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','peran')->get();
		$bidang = Kompetensi::where('karyawan_id',$pcr->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','bidang')->get();
					// dd($komp);

		return view ('pcr.editpcr',compact('pcr','komp','inti','peran','bidang'));
	}
	public function editpostpcr(Request $r,$id)
	{
		$pcr 	= Pcr::findOrFail($id);
		$komp 	= Kompetensi::where('karyawan_id',$pcr->karyawan_id)->get();

		$inti 	= Kompetensi::where('karyawan_id',$pcr->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','inti')->get();
		$peran 	= Kompetensi::where('karyawan_id',$pcr->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','peran')->get();
		$bidang = Kompetensi::where('karyawan_id',$pcr->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','bidang')->get();


		if (count($bidang) > 0) {
			$nilai_bid = round($bidang->sum('readlines')/count($bidang));
			$count_bid = 1;
		}else{
			$count_bid = 0;
			$nilai_bid = 0;
		}

		if (count($inti) > 0) {
			$nilai_inti = round($inti->sum('readlines')/count($inti));
			$count_inti = 1;
		}else{
			$count_inti = 0;
			$nilai_inti = 0;
		}

		if (count($peran) > 0) {
			$nilai_peran = round($peran->sum('readlines')/count($peran));
			$count_peran = 1;
		}else{
			$count_peran = 0;
			$nilai_peran = 0;
		}


		foreach ($komp as $k => $v) {
			//INSERT TABLE KOMPETENSI
			$v->sem1 		= $r->sem1[$k];
			$v->sem2 		= $r->sem2[$k];
			$v->readlines 	= round(($r->sem1[$k]/$v->standar)*100);
			$v->save();


			$pcr->pcr = ($nilai_inti+$nilai_inti+$nilai_bid)/($count_peran+$count_inti+$count_bid);
			$pcr->save();
		}



		return redirect()->back()->with('success','Berhasil edit data');

	}
	public function pcrlama()
	{
		// $pcrs = Pcr::all();
		$pcrs = Pcr::join('kompetensi', 'pcr.kompetensi_id', 'kompetensi.id')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id' )
		->join('jenis_kompetensi', 'kompetensi.jenis_kompetensi', 'jenis_kompetensi.id' )
		->select('pcr.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.jen_jabatan', 'jenis_kompetensi.nama as nama_kompetensi', 'kompetensi.jenis_kompetensi','kompetensi.standar')
		->get();

					// dd($pcrs);

		return view ('pcr', compact('pcrs'));
	}
	public function ekspor_pcr($id){
		$pcr = Pcr::join('karyawan', 'pcr.karyawan_id', 'karyawan.id' )
		->select('pcr.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.jen_jabatan','karyawan.nid')
		->where('pcr.id',$id)
		->first();

		$komp = Kompetensi::where('karyawan_id',$pcr->karyawan_id)
		->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')
		->select('kompetensi.standar','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.jenis_kompetensi','jenis_kompetensi.no','kompetensi.id','jenis_kompetensi.nama','jenis_kompetensi.type')
		->get();

		$inti 	= Kompetensi::where('karyawan_id',$pcr->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','inti')->get();
		$peran 	= Kompetensi::where('karyawan_id',$pcr->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','peran')->get();
		$bidang = Kompetensi::where('karyawan_id',$pcr->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','bidang')->get();
					// dd($komp);

		return view ('pcr.ekspor_pcr',compact('pcr','komp','inti','peran','bidang'));

	}
}
