<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function dashboard()
    {
        $gudep_id = auth()->user()->gudep_id;
        $gudep = Gudep::where('id',$gudep_id)->first();

        $anggota_muda = Anggota_gudep::where(['gudep_id'=>$gudep_id,'jenis_anggota'=>'Anggota Muda'])->count();
        $anggota_dewasa = Anggota_gudep::where(['gudep_id'=>$gudep_id,'jenis_anggota'=>'Anggota Dewasa'])->count();
        return view('dashboard_gudep',compact('gudep','anggota_muda','anggota_dewasa'));
    }

    public function dashboard_kwarcab()
    {
        $anggota = Anggotakwarcab::count();
        return view('dashboard_kwarcab',compact('anggota'));
    }
    
    public function dashboard_kwaran()
    {
        $kwaran_id = auth()->user()->kwaran_id;
        $anggota = Anggotakwaran::where('kwaran_id',$kwaran_id)->count();

        $penguruskwaran = Penguruskwaran::where('kwaran_id',$kwaran_id)->count();
        $mabiran = Mabiran::where('kwaran_id',$kwaran_id)->count();
        $lpk = Lpk::where('kwaran_id',$kwaran_id)->count();
        $dewankerja = Dewankerjakwaran::where('kwaran_id',$kwaran_id)->count();

        return view('dashboard_kwaran',compact('anggota','penguruskwaran','mabiran','lpk','dewankerja'));
    }

}
