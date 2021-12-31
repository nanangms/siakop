<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.home');
    }

    public function register(){
        return view('frontend.register');
    }

    public function cek_anggota($nik){
        $anggota = Anggota::where('nik',$nik)->firstorfail();
        return $anggota;
    }

    public function register_submit(Request $request){
        $cek = User::where('anggota_id',$request->anggota_id)->first();

        if($cek){
            return redirect()->back()->with('gagal','Anggota '.$cek->name.' Sudah Punya Akun');
        }

        $this->validate($request,[
            'name'      =>'required',
            'no_hp'      =>'required',
            'email'     =>'required|email|unique:users',
            'password'  =>'required|min:8',
            'konfirmasi_password'=>'required|same:password',
        ]);

        $confirmation_code = Str::random(64);

        DB::beginTransaction();
        try{
            $user = new User;
            $user->anggota_id   = $request->anggota_id;
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->no_hp        = $request->no_hp;
            $user->kode_verifikasi        = $confirmation_code;
            $user->password     = Hash::make($request->konfirmasi_password);
            $user->role_id      = '3';
            $user->is_active    = 'N';
            $user->verifikasi   = 'N';
            $user->save();

            Mail::send('frontend.verify', ['confirmation_code' => $confirmation_code,'nama'=>$request->name], function($message) use($request){
              $message->to($request->email);
              $message->subject('Konfirmasi alamat email anda');
            });

            DB::commit();
            return redirect('/register-anggota/berhasil')->with('sukses','Register Anggota Berhasil');
        }catch (\Exception $e){
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal',$e->getMessage());
        }

    }

    public function berhasil(){
        return view('frontend.registrasi_berhasil');
    }

    public function verify($code)
    {
        if(!$code)
        {
            return redirect('/')->with('gagal','Link tidak terdaftar!');
            //return "link tidak terdaftar";
        }
 
        $user = User::where('kode_verifikasi', $code)->first();
 
        if (!$user)
        {
            return "link tidak terdaftar";
        }

        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->verifikasi = 'Y';
        $user->is_active = 'Y';
        $user->kode_verifikasi = null;
        $user->save();
        return redirect('/login')->with('sukses','Akun anda telah berhasil di verifikasi, silahkan login!');

    }
}
