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
class KompetensisController extends Controller
{


	public function index()
	{
		$kompetensis = Kompetensi::all();
		$kompetensis = Kompetensi::join('karyawan', 'kompetensi.karyawan_id', 'karyawan.id' )
        ->join('jenis_kompetensi', 'kompetensi.jenis_kompetensi', 'jenis_kompetensi.id' )
        ->select('kompetensi.*','karyawan.nama', 'karyawan.jabatan', 'karyawan.nid','jenis_kompetensi.nama as nama_jenis','jenis_kompetensi.no')
        ->orderBy('kompetensi.id','DESC')
        ->paginate(10);
        // ->get();
        // dd(count($kompetensis));
        return view ('kompetensi.kompetensi', compact('kompetensis'));
    }
    public function tambah_kompetensi()
    {
        $user  = Karyawan::all();
        $jenis = JenisKompetensi::all();
        return view ('kompetensi.tambah_kompetensi',compact('user','jenis'));
    }
    public function post_kompetensi(Request $r)
    {
        // dd(request()->all());
        $cek = Kompetensi::where('karyawan_id',$r->karyawan)->where('jenis_kompetensi',$r->jenis)->first();
        if (count($cek) > 0) {
            return redirect()->back()->with('warning','Maaf data yang anda masukan sudah ada');
        }

        $cekkomp  = Kompetensi::where('semester','1')->where('karyawan_id',$r->karyawan)->where('jenis_kompetensi',$r->jenis)->where('tahun',date('Y'))->first();   

        if ($r->sem == '1') {
            $komp = new Kompetensi;
            $komp->karyawan_id      = $r->karyawan;
            $komp->jenis_kompetensi = $r->jenis;
            $komp->standar          = $r->standar;
            $komp->tahun            = date('Y');
            $komp->nilai            = $r->nilai;
            $komp->semester         = $r->sem;
            $komp->sem1             = $r->nilai;
            $komp->readlines        = round(($r->nilai/$r->standar)*100);
            $komp->gap              = $r->gap;
            $komp->unit             = $r->unit;
            $komp->save();
        }
        if($r->sem == '2'){
            if (count($cekkomp) == 0) {
                return redirect()->back()->with('warning','Maaf data untuk semester 1 belum anda masukan');
            }else{
                $cekkomp->sem2 = $r->nilai;
                $cekkomp->save();
            }
        }

        //PCRNYA
        $inti   = Kompetensi::join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('karyawan_id',$r->karyawan)->where('type','inti')->get();
        $peran  = Kompetensi::join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('karyawan_id',$r->karyawan)->where('type','peran')->get();
        $bidang = Kompetensi::join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('karyawan_id',$r->karyawan)->where('type','bidang')->get();

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
            $count_peran = 1;
            $nilai_peran = 0;
        }

        if (count($bidang) > 0) {
            $nilai_bid = round($bidang->sum('readlines')/count($bidang));
            $count_bid = 1;
        }else{
            $count_bid = 0;
            $nilai_bid = 0;
        }

        $cek_pcr = Pcr::where('karyawan_id',$r->karyawan)->first();
        if (count($cek_pcr) == 0) {
            $pcr = new Pcr;
            $pcr->karyawan_id = $r->karyawan;
            $pcr->pcr     = ($nilai_inti+$nilai_peran+$nilai_bid)/($count_peran+$count_inti+$count_bid);
            $pcr->tahun       = date('Y');
            $pcr->save();
        }else{
            $pcr = Pcr::where('karyawan_id',$r->karyawan)->first();
            $pcr->pcr     = ($nilai_inti+$nilai_peran+$nilai_bid)/($count_peran+$count_inti+$count_bid);
            $pcr->save();
        }

        return redirect()->back()->with('success','Berhasil ditambahkan');
    }
    public function editkompetensi($id)
    {
        $komp = Kompetensi::join('karyawan', 'kompetensi.karyawan_id', 'karyawan.id' )
        ->join('jenis_kompetensi', 'kompetensi.jenis_kompetensi', 'jenis_kompetensi.id' )
        ->select('kompetensi.*','karyawan.nama','jenis_kompetensi.nama as nama_jenis')
        ->where('kompetensi.id',$id)
        ->first();

        $jenis = JenisKompetensi::all();

        return view('kompetensi.edit_kompetensi',compact('komp','jenis'));
    }
    public function editpostkompetensi(Request $r,$id)
    {
        $komp = Kompetensi::findOrFail($id);
        $komp->standar          = $r->standar;
        $komp->nilai            = $r->sem1;
        $komp->gap              = $r->gap;
        $komp->sem1             = $r->sem1;
        $komp->sem2             = $r->sem2;
        $komp->readlines        = round(($r->sem1/$r->standar)*100);
        $komp->unit             = $r->unit;
        $komp->save();

        return redirect()->back()->with('success','Berhasil edit data');
    }
    public function hapuskompetensi($id)
    {
        Kompetensi::findOrFail($id)->delete();
        return redirect()->back()->with('success','Berhasil edit data');
    }
    public function tambahjenis()
    {
        return view ('jenis_kompetensi.tambah_jeniskom');   
    }
    public function post_jeniskom(Request $r)
    {
        $jenis = new JenisKompetensi;
        if ($r->tipe == 'inti') {
            $cari = JenisKompetensi::where('type','inti')->orderBy('id','DESC')->first();
        }elseif($r->tipe == 'peran'){
            $cari = JenisKompetensi::where('type','peran')->orderBy('id','DESC')->first();
        }elseif($r->tipe == 'bidang'){
            $cari = JenisKompetensi::where('type','bidang')->orderBy('id','DESC')->first();
        }
        if (empty($cari)) {
            $no = 1;
        }else{
            $no = $cari->no+1;
        }
        $jenis->no = $no;
        $jenis->nama = $r->nama;
        $jenis->type = $r->tipe;
        $jenis->save();
        return redirect()->back()->with('success','Berhasil tambah');
    }
    public function importExport()
    {
        return view('kompetensi');
    }
   public function importExcel()
    {
        // dd(phpinfo());
        // set_time_limit(600000000);
        if(Input::hasFile('import_file')){

            $path = input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    
                    $datauser[$key]     = Karyawan::where('nid',$value->nid)->get();
                    $datajenkom[$key]   = JenisKompetensi::where('nama',$value->kompetensi)->get();

                    foreach ($datauser[$key] as $k => $v) {
                        foreach ($datajenkom[$key] as $a => $b) {
                            
                            if ($value->semester == '1') {
                                $insert[$k] = [
                                    'karyawan_id'       => $v->id,
                                    'jenis_kompetensi'  => $b->id,
                                    'standar'           => $value->standar,
                                    'tahun'             => date('Y'),
                                    'nilai'             => $value->nilai,
                                    'semester'          => $value->semester,
                                    'sem1'              => $value->nilai,
                                    'readlines'         => round(($value->nilai/$value->standar)*100),
                                    'gap'               => $value->gap,
                                    'unit'              => $value->unit,
                                 ];
                                 DB::table('kompetensi')->insert($insert[$k]);
                             }

                             if ($value->semester == '2') {
                                    $cekkomp2[$k] = Kompetensi::where('semester','1')->where('karyawan_id',$v->id)->where('jenis_kompetensi',$b->id)->where('tahun',date('Y'))->first();
                                    $cekkomp2[$k]->sem2 = $value->nilai;
                                    $cekkomp2[$k]->save();
                             }

                        }

                        $inti[$k]   = Kompetensi::join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('karyawan_id',$v->id)->where('type','inti')->get();
                        $peran[$k]  = Kompetensi::join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('karyawan_id',$v->id)->where('type','peran')->get();
                        $bidang[$k] = Kompetensi::join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('karyawan_id',$v->id)->where('type','bidang')->get();

                        if (count($inti[$k]) > 0) {
                            $nilai_inti = round($inti[$k]->sum('readlines')/count($inti[$k]));
                            $count_inti = 1;
                        }else{
                            $count_inti = 0;
                            $nilai_inti = 0;
                        }

                        if (count($peran[$k]) > 0) {
                            $nilai_peran = round($peran[$k]->sum('readlines')/count($peran[$k]));
                            $count_peran = 1;
                        }else{
                            $count_peran = 1;
                            $nilai_peran = 0;
                        }

                        if (count($bidang[$k]) > 0) {
                            $nilai_bid = round($bidang[$k]->sum('readlines')/count($bidang[$k]));
                            $count_bid = 1;
                        }else{
                            $count_bid = 0;
                            $nilai_bid = 0;
                        }

                        $cek_pcr[$k] = Pcr::where('karyawan_id',$v->id)->first();
                        if (count($cek_pcr[$k]) == 0) {
                            $pcr[$k] = new Pcr;
                            $pcr[$k]->karyawan_id   = $v->id;
                            $pcr[$k]->tahun         = date('Y');
                            $pcr[$k]->pcr           = ($nilai_inti+$nilai_peran+$nilai_bid)/($count_peran+$count_inti+$count_bid);
                            $pcr[$k]->save();
                        }
                    }   
                }
            }
            return redirect()->back()->with('success','Berhasil import data');
        }
    }
    public function hapus()
    {
        $komp = Kompetensi::all();
        foreach ($komp as $k => $v) {
            $pcr = Pcr::where('karyawan_id',$v->karyawan_id)->delete();
        }
        Kompetensi::truncate();
        return redirect()->back()->with('success','Berhasil hapus data kompetensi');
    }
}