<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenissimpanan;
use App\Models\Anggota;
use App\Models\Simpanan;
use App\Models\Saldo_harian;
use DB;
use DataTables;
use App\Http\Requests\SimpananRequest;
use PDF;

class SimpananController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){
        return view('simpanan.index');
    }

    public function create(){
        $no_urut = Simpanan::max('no_urut');
        $last_record = Simpanan::orderBy('id','desc')->first();
        $no = 1;

        if(date('Y') != substr($last_record->tgl_transaksi,0,4)){
            $format_notransaksi = sprintf("%04s", $no);
        }else{
            $format_notransaksi = sprintf("%04s", abs($last_record->no_urut + 1));
        }
                
        $jenis_simpanan = Jenissimpanan::select('jenissimpanan.id','jenissimpanan.kode_jenis','jenissimpanan.nama_jenis')->get();
        $anggota = Anggota::select('anggota.id','anggota.no_anggota','anggota.nama_lengkap')->where('status','AKTIF')->get();
        return view('simpanan.tambah',compact('jenis_simpanan','anggota','format_notransaksi'));
    }

    public function store(SimpananRequest $request)
    {
        $checksaldo = Saldo_harian::where('anggota_id',$request->anggota_id)->orderBy('id','desc')->first();
        $user_id = auth()->user()->id;
        if(!$checksaldo){
            $saldo = str_replace('.', '', $request->jumlah);
        }else{
            if($request->jenis_transaksi == 'kredit'){
                $saldo = $checksaldo->saldo + str_replace('.', '', $request->jumlah);
            }else{
                if(str_replace('.', '', $request->jumlah) > $checksaldo->saldo){
                    return redirect()->back()->with('gagal','Saldo Tidak Cukup');
                }
                $saldo = $checksaldo->saldo - str_replace('.', '', $request->jumlah);
            }
        }
        //dd($saldo);
        DB::beginTransaction();
        try{
            $data = new Simpanan;
            $data->anggota_id        = $request->anggota_id;
            $data->no_urut           = $request->no_urut;
            $data->no_transaksi      = $request->no_transaksi;
            $data->tgl_transaksi     = $request->tgl_transaksi;
            $data->jenis_transaksi   = $request->jenis_transaksi;
            $data->jenissimpanan_id  = $request->jenissimpanan_id;
            $data->keterangan        = $request->keterangan;
            $data->jumlah            = str_replace('.', '', $request->jumlah);
            $data->user_id           = $user_id;
            $data->save();

            $saldo_h = new Saldo_harian;
            $saldo_h->simpanan_id       = $data->id;
            $saldo_h->anggota_id        = $request->anggota_id;
            $saldo_h->tgl_transaksi     = $request->tgl_transaksi;
            $saldo_h->saldo             = $saldo;
            $saldo_h->save();

            DB::commit();
            return redirect('/simpanan/cetak-nota/'.$data->uuid)->with('sukses','Simpanan Berhasil Disimpan');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('gagal',$e->getMessage());
        }
    }

    public function cetak_nota($id){
        $simpanan = Simpanan::with(['anggota','jenissimpanan','user'])->where('uuid',$id)->first();
        return view('simpanan.cetak_nota',compact('simpanan'));
    }

    public function print_nota($id){
        $simpanan = Simpanan::with(['anggota','jenissimpanan','user'])->where('uuid',$id)->first();

        $pdf = PDF::loadView('simpanan.print_nota',['simpanan' => $simpanan])->setPaper('portrait','a4');
        return $pdf->stream('simpanan.print_nota');
    }

//     public function update(Request $request,$id)
//     {
//         $checksaldo = Saldo_harian::where('anggota_id',$request->anggota_id)->orderBy('id','desc')->first();
//     if(!$checksaldo){
//             $saldo = str_replace('.', '', $request->jumlah);
//         }else{
//         if($request->jenis_transaksi == 'kredit'){
//             $saldo = $checksaldo->saldo + str_replace('.', '', $request->jumlah);
//         }else{
//             $saldo = $checksaldo->saldo - str_replace('.', '', $request->jumlah);
//         }
// }
//         DB::beginTransaction();
//         try{
//             $data = Simpanan::where('uuid',$id)->first();
//             $data->jenis_transaksi   = $request->jenis_transaksi;
//             $data->jenissimpanan_id  = $request->jenissimpanan_id;
//             $data->keterangan        = $request->keterangan;
//             $data->jumlah            = str_replace('.', '', $request->jumlah);
//             $data->save();

//             $saldo_h =Saldo_harian::where('simpanan_id',$data->id)->first();
//             $saldo_h->saldo          = $saldo;
//             $saldo_h->save();

//             DB::commit();
//             return redirect('/simpanan/transaksi')->with('sukses','Simpanan Berhasil Disimpan');
//         }catch (\Exception $e){
//             DB::rollback();
//             return redirect()->back()->with('gagal',$e->getMessage());
//         }
//     }

    public function transaksi(){
        return view('simpanan.transaksi');
    }
    public function perorangan(){
        return view('simpanan.perorangan');
    }

    public function detail($anggota_id){
        $id = $anggota_id;
        $anggota = Anggota::with('agama')->where('id',$anggota_id)->first();
        return view('simpanan.detail',compact('id','anggota'));
    }

    public function edit($id){
        $simpanan = Simpanan::with('anggota')->where('uuid',$id)->first();
        $anggota = Anggota::select('anggota.id','anggota.no_anggota','anggota.nama_lengkap')->get();
        $jenis_simpanan = Jenissimpanan::select('jenissimpanan.id','jenissimpanan.kode_jenis','jenissimpanan.nama_jenis')->get();
        return view('simpanan.edit',compact('anggota','simpanan','jenis_simpanan'));
    }

    public function delete($id)
    {
        $simpanan = Simpanan::where('uuid',$id)->first();
        $saldo_h = Saldo_harian::where('simpanan_id',$simpanan->id)->first();

        $simpanan->delete();
        $saldo_h->delete();
    }

    public function dataTable()
    {
        $data = DB::table('simpanan as a')
                ->select('a.*','b.nama_lengkap','b.no_anggota','c.kode_jenis','c.nama_jenis','d.name')
                ->join('anggota as b', 'a.anggota_id', '=', 'b.id')
                ->join('jenissimpanan as c', 'a.jenissimpanan_id', '=', 'c.id')
                ->join('users as d', 'a.user_id', '=', 'd.id')
                ->orderBy('a.id','desc');
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $cetaknota = '<a href="/simpanan/cetak-nota/'.$data->uuid.'" class="btn btn-default btn-xs"><i class="fa fa-print"></i></a>';
                $edit = '<button data-toggle="modal" data-target-id="'.$data->uuid.'" data-target="#ShowEDIT" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></button>';
                $hapus = '<button class="btn btn-danger btn-xs hapus" data-name="'.$data->no_transaksi.'" data-id="'.$data->uuid.'" title="Batalkan Transaksi"><i class="fa fa-times"></i></button>';

                if(auth()->user()->role->nama_role == "Super Admin"){
                    if($data->tgl_transaksi == date('Y-m-d')){
                        return $cetaknota.' '.$hapus;
                    }else{
                        return $cetaknota;
                    }
                }else{
                    return $cetaknota;
                }
            })
            ->addColumn('tgl_transaksi', function ($data) {
                return Tanggal($data->tgl_transaksi);
            })
            ->addColumn('nama_anggota', function ($data) {
                return str_pad($data->no_anggota,3,'0',STR_PAD_LEFT).' / '.$data->nama_lengkap;
            })
            ->addColumn('jenissimpanan', function ($data) {
                return $data->kode_jenis.' '.$data->nama_jenis;
            })
            ->addColumn('jenis_transaksi', function ($data) {
                if($data->jenis_transaksi == "kredit"){
                    return "<span class='badge badge-success'>Setoran</span>";
                }elseif($data->jenis_transaksi == "debit"){
                    return "<span class='badge badge-danger'>Penarikan</span>";
                }
                
            })
            ->addColumn('jumlah', function ($data) {
                return 'Rp '.number_format($data->jumlah,0,',','.');
            })
            ->addIndexColumn()
            ->rawColumns(['action','nama_anggota','jenissimpanan','jenis_transaksi','tgl_transaksi','jumlah'])
            ->make(true);
    }

    public function simpanan_anggota($id)
    {
        $data = DB::table('simpanan as a')
                ->select('a.*','b.nama_lengkap','b.no_anggota','c.kode_jenis','c.nama_jenis','d.saldo')
                ->join('anggota as b', 'a.anggota_id', '=', 'b.id')
                ->join('jenissimpanan as c', 'a.jenissimpanan_id', '=', 'c.id')
                ->join('saldo_simpanan_harian as d', 'a.id', '=', 'd.simpanan_id')
                ->where('a.anggota_id',$id)
                ->orderBy('a.id','desc');
        //$data = Simpanan::all();
        return DataTables::of($data)
             ->addColumn('jenissimpanan', function ($data) {
                return $data->kode_jenis.' '.$data->nama_jenis;
            })
            ->addColumn('debit', function ($data) {
                if($data->jenis_transaksi == "debit"){
                    return 'Rp '.number_format($data->jumlah,0,',','.');
                }else{
                    return "";
                }
                
            })
            ->addColumn('tgl_transaksi', function ($data) {
                return Tanggal($data->tgl_transaksi);
            })
            ->addColumn('kredit', function ($data) {
                if($data->jenis_transaksi == "kredit"){
                    return 'Rp '.number_format($data->jumlah,0,',','.');
                }else{
                    return "";
                }
                
            })
            ->addColumn('saldo', function ($data) {
                return 'Rp '.number_format($data->saldo,0,',','.');
            })
            ->addIndexColumn()
            ->rawColumns(['debit','kredit','jenissimpanan','debit','saldo','tgl_transaksi'])
            ->make(true);
    }

    public function DataTableperorangan()
    {
        $data = DB::table('simpanan as a')
                ->select('a.*','b.nama_lengkap','b.no_anggota','c.kode_jenis','c.nama_jenis')
                ->join('anggota as b', 'a.anggota_id', '=', 'b.id')
                ->join('jenissimpanan as c', 'a.jenissimpanan_id', '=', 'c.id')
                ->groupBy('a.anggota_id')
                ->orderBy('a.id','desc')
                ->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data){
                return '<button data-toggle="modal" data-target-id="'.$data->anggota_id.'" data-target="#ShowDETAIL" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-search"></i> Detail</button>';
            })
            ->addColumn('nama_anggota', function ($data) {
                return str_pad($data->no_anggota,3,'0',STR_PAD_LEFT).' / '.$data->nama_lengkap;
            })
            ->addColumn('jenissimpanan', function ($data) {
                return $data->kode_jenis.' '.$data->nama_jenis;
            })
            ->addColumn('debit', function ($data) {
                if($data->jenis_transaksi == "debit"){
                    return 'Rp '.number_format($data->jumlah,0,',','.');
                }else{
                    return "";
                }
            })
            ->addColumn('kredit', function ($data) {
                if($data->jenis_transaksi == "kredit"){
                    return 'Rp '.number_format($data->jumlah,0,',','.');
                }else{
                    return "";
                }
            })
            ->addColumn('saldo', function ($data) {
                $saldo_terakhir = Saldo_harian::where('anggota_id',$data->anggota_id)->latest()->first();
                return 'Rp '.number_format($saldo_terakhir->saldo,0,',','.');
            })
            ->addIndexColumn()
            ->rawColumns(['debit','kredit','jenissimpanan','saldo','nama_anggota','action'])
            ->make(true);
    }
}
