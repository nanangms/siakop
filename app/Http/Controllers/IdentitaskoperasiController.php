<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identitaskoperasi;
use DB;

class IdentitaskoperasiController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){
        $identiti = Identitaskoperasi::where('id',1)->first();
        return view('identitas_koperasi.index',compact('identiti'));
    }

    public function update(Request $request){

        DB::beginTransaction();
        try{
            $identiti = Identitaskoperasi::where('uuid',$request->uuid)->first();
            $identiti->nama_koperasi   = $request->nama_koperasi;
            $identiti->nama_pimpinan   = $request->nama_pimpinan;
            $identiti->no_hp           = $request->no_hp;
            $identiti->no_telp         = $request->no_telp;
            $identiti->alamat          = $request->alamat;
            $identiti->kota            = $request->kota;
            $identiti->email           = $request->email;
            $identiti->website         = $request->website;
            $identiti->save();

            DB::commit();
            return redirect()->back()->with('sukses','Identitas Berhasil diubah');
        }catch (\Exception $e){
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal',$e->getMessage());
        }

    }
}
