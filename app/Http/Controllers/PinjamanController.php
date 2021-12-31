<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenispinjaman;
use App\Models\Pinjaman;
use App\Models\Anggota;
use App\Models\Bungapinjaman;

class PinjamanController extends Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){
        $jenis_pinjaman = Jenispinjaman::select('id','nama_jenis')->get();
        return view('pinjaman.index',compact('jenis_pinjaman'));
    }

    public function tambahjenispinjaman($id){
        $jenis_pinjaman = Jenispinjaman::select('id','nama_jenis')->where('id',$id)->first();

        $no_urut = Pinjaman::max('no_urut');
        $last_record = Pinjaman::orderBy('id','desc')->first();
        $no = 1;

        if(!$no_urut){
            $nomor_pinjaman = sprintf("%04s", $no);
        }elseif(date('Y') != substr($last_record->tgl_pinjaman,0,4)){
            $nomor_pinjaman = sprintf("%04s", $no);
        }else{
            $nomor_pinjaman = sprintf("%04s", abs($last_record->no_urut + 1));
        }

        $anggota = Anggota::select('anggota.id','anggota.no_anggota','anggota.nama_lengkap')->where('status','AKTIF')->get();
        $jangkawaktu = Bungapinjaman::select('bunga_pinjaman.jangka_waktu','bunga_pinjaman.nilai_bunga')->get();
        if($id == 1){
            return view('pinjaman.tambah1',compact('jenis_pinjaman','anggota','nomor_pinjaman','jangkawaktu'));
        }elseif($id == 2){
            return view('pinjaman.tambah2',compact('jenis_pinjaman','anggota','nomor_pinjaman','jangkawaktu'));
        }elseif($id == 3){
            return view('pinjaman.tambah3',compact('jenis_pinjaman','anggota','nomor_pinjaman','jangkawaktu'));
        }
        
    }
}
