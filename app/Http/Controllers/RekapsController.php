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

		$spv_produk5a = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 A')
		->first();

		$spv_produk5b = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 B')
		->first();

		$spv_produk5c = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 C (Pjs)')
		->first();

		$spv_produk5d = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 D')
		->first();

		$spv_produk5e = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 E (Pjs)')
		->first();

		$spv_kimia = DB::table('pcr')
		->join('karyawan', 'pcr.karyawan_id', 'karyawan.id')
		->select('pcr.*', 'karyawan.nid', 'karyawan.jabatan')
		->where('karyawan.jabatan', 'SUPERVISOR SENIOR KIMIA & LABORATORIUM')
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

		$sum_general   = Karyawan::where('jabatan','like','%MANAJER ENJINIRING & QUALITY ASSURANCE (PjS)%')
		->orwhere('jabatan','like','%MANAJER OPERASI%')
		->orwhere('jabatan','like','%MANAJER CNG & BAHAN BAKAR%')
		->orwhere('jabatan','like','%MANAJER PEMELIHARAAN%')
		->orwhere('jabatan','like','%MANAJER LOGISTIK%')
		->orwhere('jabatan','like','%MANAJER KEUNGAN & ADMINISTRASI%')
		->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');

		$count_general = Karyawan::where('jabatan','like','%MANAJER ENJINIRING & QUALITY ASSURANCE (PjS)%')
		->orwhere('jabatan','like','%MANAJER OPERASI%')
		->orwhere('jabatan','like','%MANAJER CNG & BAHAN BAKAR%')
		->orwhere('jabatan','like','%MANAJER PEMELIHARAAN%')
		->orwhere('jabatan','like','%MANAJER LOGISTIK%')
		->orwhere('jabatan','like','%MANAJER KEUNGAN & ADMINISTRASI%')
		->count();
		$spv_general = $sum_general/ $count_general;

		$sum_engineer   = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR SYSTEM OWNER PLTGU%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR TECHNOLOGY OWNER%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN%')
		->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');

		$count_engineer = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR SYSTEM OWNER PLTGU%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR TECHNOLOGY OWNER%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN%')
		->count();
		$spv_engineer = $sum_engineer/ $count_engineer;

		$sum_operasi   = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 A%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 B%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 C%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 D%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 E (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 A%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 B%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 C%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 D%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 E (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 A%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 B%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 C (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 D%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 E (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR KIMIA & LABORATORIUM%')
		->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');

		$count_operasi = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 A%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 B%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 C%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 D%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 E (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 A%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 B%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 C%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 D%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 E (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 A%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 B%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 C (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 D%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 E (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR KIMIA & LABORATORIUM%')
		->count();
		$spv_operasi = $sum_operasi/ $count_operasi;


		$sum_cng   = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR OPERASI & PEMELIHARAAN CNG PLANT%')
		->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');

		$count_cng = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR OPERASI & PEMELIHARAAN CNG PLANT%')
		->count();
		$spv_bahanbakar = $sum_cng/ $count_cng;


		$sum_pemeliharaan   = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR RENDAL PEMELIHARAAN%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 1.2 (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 3.4 (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 3.4%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 3.4%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 5%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 5%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 5%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR OUTAGE MANAGEMENT%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR SARANA%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR LINGKUNGAN%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR K3%')
		->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');

		$count_pemeliharaan = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR RENDAL PEMELIHARAAN%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 1.2 (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 3.4 (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 3.4%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 3.4%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 5%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 5%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 5%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR OUTAGE MANAGEMENT%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR SARANA%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR LINGKUNGAN%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR K3%')
		->count();
		$spv_pemeliharaan = $sum_pemeliharaan/ $count_pemeliharaan;


		$sum_logistik   = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PENGADAAN%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR ADMINISTRASI GUDANG%')
		->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');

		$count_logistik = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR PENGADAAN%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR ADMINISTRASI GUDANG%')
		->count();
		$spv_logistik = $sum_logistik/ $count_logistik;


		$sum_keuangan   = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR SDM (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR UMUM & CSR%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR KEUANGAN%')
		->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');

		$count_keuangan = Karyawan::where('jabatan','like','%SUPERVISOR SENIOR SDM (Pjs)%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR UMUM & CSR%')
		->orwhere('jabatan','like','%SUPERVISOR SENIOR KEUANGAN%')
		->count();
		$spv_keuanganadm = $sum_keuangan/ $count_keuangan;


		$jcr_engineer2   = Karyawan::where('jabatan','like','%SENIOR ENGINEER II ENJINIRING & QUALITY ASSURANCE%')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');
		$count_engineer2 = Karyawan::where('jabatan','like','%SENIOR ENGINEER II ENJINIRING & QUALITY ASSURANCE%')->count();
		$engineer2 = $jcr_engineer2 / $count_engineer2;


		$jcr_operasi   = Karyawan::where('jabatan','like','%SENIOR ENGINEER II OPERASI%')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');
		$count_operasi = Karyawan::where('jabatan','like','%SENIOR ENGINEER II OPERASI%')->count();
		$operasi = $jcr_operasi / $count_operasi;


		$jcr_pemeliharaan   = Karyawan::where('jabatan','like','%SENIOR ENGINEER II PEMELIHARAAN%')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');
		$count_pemeliharaan = Karyawan::where('jabatan','like','%SENIOR ENGINEER II PEMELIHARAAN%')->count();
		$pemeliharaan = $jcr_pemeliharaan / $count_pemeliharaan;


		$jcr_keuangan   = Karyawan::where('jabatan','like','%SENIOR OFFICER II KEUANGAN & ADMINISTRASI%')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');
		$count_keuangan = Karyawan::where('jabatan','like','%SENIOR OFFICER II KEUANGAN & ADMINISTRASI%')->count();
		$keuangan = $jcr_keuangan / $count_keuangan;


		$jcr_sum4   = Karyawan::where('jabatan','like','%SYSTEM OWNER COMMON CNG%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');
		$jcr_count4 = Karyawan::where('jabatan','like','%SYSTEM OWNER COMMON CNG%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG')->count();
		$jcr4 = $jcr_sum4 / $jcr_count4;


		return view ('rekap.index', compact('gen_manager', 'man_pemeliharaan', 'man_enjiniring', 'spv_ownerpltgu', 'spv_ownercng', 'spv_technoowner','spv_muturisiko','man_operasi', 'spv_rendal12', 'spv_rendal345','spv_produk12a', 'spv_produk12b', 'spv_produk12c', 'spv_produk12d', 'spv_produk12e', 'spv_produk34a', 'spv_produk34b', 'spv_produk34c', 'spv_produk34d', 'spv_produk34e', 'spv_produk5a', 'spv_produk5b', 'spv_produk5c', 'spv_produk5d', 'spv_produk5e','spv_rendalpemeliharaan', 'spv_mesin12', 'spv_listrik12', 'spv_kontrol12', 'spv_outagemanaj', 'spv_k3', 'spv_lingkungan', 'spv_sarana', 'man_keuangan', 'spv_keuangan', 'spv_umum','spv_sdm', 'man_logistik', 'spv_pengadaan', 'spv_gudang', 'spv_inventori', 'man_cng', 'spv_cng', 'spv_cngplant','jcr4','spv_kimia','engineer2', 'operasi','pemeliharaan', 'keuangan','spv_engineer','spv_operasi', 'spv_bahanbakar','spv_pemeliharaan','spv_logistik','spv_keuanganadm', 'spv_general'));
	}


	public function rekapbaru()
	{
		$jabatan = Karyawan::where('jabatan','like','SUPERVISOR%')
		->orWhere('jabatan','like','MANAJER%')
		->orWhere('jabatan','like','GENERAL MANAGER%')
		->join('pcr','karyawan.id','=','pcr.karyawan_id')
		->select('jabatan','pcr')
		->orderBy('karyawan.id','DESC')
		->get();

		$sum_pcr_general 	= Karyawan::where('jabatan','like','MANAJER%')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr');
		$count_pcr_general 	= Karyawan::where('jabatan','like','MANAJER%')->join('pcr','karyawan.id','=','pcr.karyawan_id')->count();
		$rata_general 		= ($sum_pcr_general / $count_pcr_general);

		return view('rekap.indexbaru',compact('jabatan','rata_general'));
	}

}
