<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Rekap;
use App\Karyawan;
use App\Pcr;

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

	public function table(){

		$rata = DB::table('all_jcr')
		->join('pcr', 'all_jcr.pcr_id', 'pcr.id')
		->select('all_jcr.*', 'pcr.pcr')
		->get();

		$gen_manager = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'GENERAL MANAGER')
		->first();


		$man_pemeliharaan = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'MANAJER PEMELIHARAAN')
		->first();


		$man_enjiniring = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'MANAJER ENJINIRING & QUALITY ASSURANCE (PjS)')
		->first();

		$spv_ownerpltgu = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR SYSTEM OWNER PLTGU')
		->first();

		$spv_ownercng = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG')
		->first();

		$spv_technoowner = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR TECHNOLOGY OWNER')
		->first();


		$spv_muturisiko = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN')
		->first();

		$man_operasi = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'MANAJER OPERASI')
		->first();

		$spv_rendal12 = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2')
		->first();

		$spv_rendal345 = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5')
		->first();

		$spv_produk12a = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 A')
		->first();

		$spv_produk12b = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 B')
		->first();

		$spv_produk12c = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 C')
		->first();

		$spv_produk12d = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 D')
		->first();

		$spv_produk12e = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 E (Pjs)')
		->first();

		$spv_produk34a = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 A')
		->first();

		$spv_produk34b = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 B')
		->first();

		$spv_produk34c = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 C')
		->first();

		$spv_produk34d = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 D')
		->first();

		$spv_produk34e = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 E (Pjs)')
		->first();

		$spv_rendalpemeliharaan = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR RENDAL PEMELIHARAAN')
		->first();

		$spv_mesin12 = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR  PEMELIHARAAN MESIN BLOK 1.2 (Pjs)')
		->first();

		$spv_listrik12 = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2')
		->first();

		$spv_kontrol12 = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2')
		->first();

		$spv_outagemanaj = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR OUTAGE MANAGEMENT')
		->first();

		$spv_k3 = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR K3')
		->first();

		$spv_lingkungan = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR LINGKUNGAN')
		->first();

		$spv_sarana = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR SARANA')
		->first();
		$man_keuangan = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'MANAJER KEUANGAN & ADMINISTRASI')
		->first();

		$spv_sdm = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR SDM (Pjs)')
		->first();

		$spv_umum = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR UMUM & CSR')
		->first();

		$spv_keuangan = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR KEUANGAN')
		->first();

		$man_logistik = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'MANAJER LOGISTIK')
		->first();

		$spv_pengadaan = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PENGADAAN')
		->first();

		$spv_gudang = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR ADMINISTRASI GUDANG')
		->first();

		$spv_inventori = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER')
		->first();

		$man_cng = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'MANAJER CNG & BAHAN BAKAR')
		->first();

		$spv_cng = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)')
		->first();

		$spv_cngplant = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR OPERASI & PEMELIHARAAN CNG PLANT')
		->first();


		return view ('rekap.index', compact('gen_manager', 'man_pemeliharaan', 'man_enjiniring', 'spv_ownerpltgu', 'spv_ownercng', 'spv_technoowner','spv_muturisiko','man_operasi', 'spv_rendal12', 'spv_rendal345','spv_produk12a', 'spv_produk12b', 'spv_produk12c', 'spv_produk12d', 'spv_produk12e', 'spv_produk34a', 'spv_produk34b', 'spv_produk34c', 'spv_produk34d', 'spv_produk34e','spv_rendalpemeliharaan', 'spv_mesin12', 'spv_listrik12', 'spv_kontrol12', 'spv_outagemanaj', 'spv_k3', 'spv_lingkungan', 'spv_sarana', 'man_keuangan', 'spv_keuangan', 'spv_umum','spv_sdm', 'man_logistik', 'spv_pengadaan', 'spv_gudang', 'spv_inventori', 'man_cng', 'spv_cng', 'spv_cngplant'));
	}

}
