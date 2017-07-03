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
        $cek = Kompetensi::where('karyawan_id',$r->karyawan)->where('jenis_kompetensi',$r->jenis)->first();
        if (count($cek) > 0) {
            return redirect()->back()->with('warning','Maaf data yang anda masukan sudah ada');
        }
        $komp = new Kompetensi;
        $komp->karyawan_id      = $r->karyawan;
        $komp->jenis_kompetensi = $r->jenis;
        $komp->standar          = $r->standar;
        $komp->nilai            = $r->nilai;
        $komp->gap              = $r->gap;
        $komp->unit             = $r->unit;
        $komp->save();

        $cek_pcr = Pcr::where('karyawan_id',$r->karyawan)->first();
        if (count($cek_pcr) == 0) {
            $pcr = new Pcr;
            $pcr->karyawan_id = $r->karyawan;
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
        $komp->nilai            = $r->nilai;
        $komp->gap              = $r->gap;
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
                    $datajenkom[$key]   = JenisKompetensi::where('nama',$value->nama_kompetensi)->get();

                    foreach ($datauser[$key] as $k => $v) {
                        foreach ($datajenkom[$key] as $a => $b) {
                            $insert[$k] = [
                                'karyawan_id'       => $v->id,
                                'jenis_kompetensi'  => $b->id,
                                'standar'           => $value->standar,
                                'tahun'             => date('Y'),
                                'nilai'             => $value->nilai,
                                'sem1'              => $value->nilai,
                                'readlines'         => round(($value->nilai/$value->standar)*100),
                                'gap'               => $value->gap,
                                'unit'              => $value->unit,
                             ];
                        }
                         
                        DB::table('kompetensi')->insert($insert[$k]);
                        $cek_pcr[$k] = Pcr::where('karyawan_id',$v->id)->first();
                        if (count($cek_pcr[$k]) == 0) {
                            $pcr[$k] = new Pcr;
                            $pcr[$k]->karyawan_id   = $v->id;
                            $pcr[$k]->pcr           = ($nilai_inti+$nilai_peran+$nilai_bid)/($count_peran+$count_inti+$count_bid);
                            $pcr[$k]->save();
                        }
                    }   
                }
            }
            return redirect()->back()->with('success','Berhasil import data');
        }
    }
}