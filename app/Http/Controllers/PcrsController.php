<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kompetensi;
use App\Karyawan;
use App\Pcr;
use Excel;

class PcrsController extends Controller
{
	public function index()
	{
		$pcr = Pcr::join('karyawan', 'pcr.karyawan_id', 'karyawan.id' )
		->select('pcr.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.nid')
		->paginate(10);
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
		->select('kompetensi.standar','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.jenis_kompetensi','jenis_kompetensi.no','kompetensi.id','jenis_kompetensi.nama','jenis_kompetensi.type','kompetensi.id')
		->get();

		// dd($komp);

		$inti 	= Kompetensi::where('karyawan_id',$pcr->karyawan_id)
							  ->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')
							  ->where('jenis_kompetensi.type','inti')
							  ->select('jenis_kompetensi.nama','kompetensi.standar','kompetensi.nilai','kompetensi.gap','kompetensi.unit','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.id as id_inti')
							  ->get();
		
		$peran 	= Kompetensi::where('karyawan_id',$pcr->karyawan_id)
							  ->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')
							  ->where('jenis_kompetensi.type','peran')
							  ->select('jenis_kompetensi.nama','kompetensi.standar','kompetensi.nilai','kompetensi.gap','kompetensi.unit','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.id as id_peran')
							  ->get();

		$bidang = Kompetensi::where('karyawan_id',$pcr->karyawan_id)
							  ->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')
							  ->where('jenis_kompetensi.type','bidang')
							  ->select('jenis_kompetensi.nama','kompetensi.standar','kompetensi.nilai','kompetensi.gap','kompetensi.unit','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.id as id_bidang')
							  ->get();

		return view ('pcr.editpcr',compact('pcr','komp','inti','peran','bidang'));
	}
	public function editpostpcr(Request $r,$id)
	{
		$pcr 	= Pcr::findOrFail($id);

		$inti 	= Kompetensi::where('kompetensi.id',$r->idinti)->get();
		$peran 	= Kompetensi::where('kompetensi.id',$r->idperan)->get();
		$bidang = Kompetensi::where('kompetensi.id',$r->idbidang)->get();

		if (count($bidang) > 0) {
			$nilai_bid = round($bidang->sum('readlines')/count($bidang));
			$count_bid = 1;

			foreach ($r->idbidang as $bid => $bidangnya) {
				$cek_bidang[$bid] = Kompetensi::where('id',$bidangnya)->get();
				foreach ($cek_bidang[$bid] as $c => $d) {
					$d->sem1 		= $r->sem1_bidang[$bid];
					$d->sem2 		= $r->sem2_bidang[$bid];
					$d->readlines 	= round(($r->sem1_bidang[$bid]/$d->standar)*100);
					$d->save();
				}
			}
		}else{
			$count_bid = 0;
			$nilai_bid = 0;
		}

		if (count($inti) > 0) {
			$nilai_inti = round($inti->sum('readlines')/count($inti));
			$count_inti = 1;

			foreach ($r->idinti as $i => $intinya) {
				$cek_inti[$i] = Kompetensi::where('id',$intinya)->get();
				foreach ($cek_inti[$i] as $k => $v) {
					$v->sem1 		= $r->sem1_inti[$i];
					$v->sem2 		= $r->sem2_inti[$i];
					$v->readlines 	= round(($r->sem1_inti[$i]/$v->standar)*100);
					$v->save();
				}
			}

		}else{
			$count_inti = 0;
			$nilai_inti = 0;
		}

		if (count($peran) > 0) {
			$nilai_peran = round($peran->sum('readlines')/count($peran));
			$count_peran = 1;

			foreach ($r->idperan as $p => $perannya) {
				$cek_peran[$p] = Kompetensi::where('id',$perannya)->get();
				foreach ($cek_peran[$p] as $a => $b) {
					$b->sem1 		= $r->sem1_peran[$p];
					$b->sem2 		= $r->sem2_peran[$p];
					$b->readlines 	= round(($r->sem1_peran[$p]/$b->standar)*100);
					$b->save();
				}
			}

		}else{
			$count_peran = 0;
			$nilai_peran = 0;
		}

		//SAVE PCR
		$pcr->pcr = ($nilai_inti+$nilai_peran+$nilai_bid)/($count_peran+$count_inti+$count_bid);
		$pcr->save();

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

	public function eskporpcr()
	{
		$kompetensi = Pcr::join('karyawan', 'pcr.karyawan_id', 'karyawan.id' )
		->select('pcr.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.jen_jabatan','karyawan.nid')
		->get();

       	Excel::create('KOMP', function($excel) use($kompetensi) {
    		$excel->sheet('KOMP', function($sheet) use($kompetensi) {
       			$sheet->fromArray($kompetensi);
        	});
        })->download('xls');
	}
	public function eskporange(Request $r)
	{
		$pcr = Pcr::join('karyawan', 'pcr.karyawan_id', 'karyawan.id' )
		->select('pcr.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.jen_jabatan','karyawan.nid')
		->where('pcr.pcr','>','0')
		->whereBetween('pcr.updated_at', [date('Y-m-d',strtotime($r->dari)), date('Y-m-d',strtotime($r->sampai))])
		->get();

		return view ('pcr.eksporange',compact('pcr'));
	}
}
