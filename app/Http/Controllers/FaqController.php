<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Faq;

class FaqController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){
        return view('faq.index');
    }

    public function dataTable()
    {
        $faq = Faq::select('faq.*')->orderBy('urutan', 'asc');
        
        return DataTables::of($faq)
            ->addColumn('action', function ($faq) {
                return '<a href="/faq/'.$faq->uuid.'/edit" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
                    <button title="Hapus" class="btn btn-danger btn-xs hapus" faq-name="'.$faq->pertanyaan.'" faq-id="'.$faq->uuid.'"><i class="fa fa-trash"></i></button>';
            })
            ->addColumn('jawaban', function ($faq){
                return $faq->jawaban;
            })
            ->addIndexColumn()
            ->rawColumns(['action','jawaban'])
            ->make(true);
    }

    public function create(Request $request){
    	$this->validate($request,[
            'pertanyaan'=>'required',
            'jawaban'=>'required',
            'kategori'=>'required',
            'urutan'=>'required'
        ]);

        DB::beginTransaction();
        try{

            $faq = new \App\Models\Faq;
            $faq->pertanyaan 	= $request->pertanyaan;
            $faq->jawaban  		= $request->jawaban;
            $faq->kategori     	= $request->kategori;
            $faq->urutan     	= $request->urutan;
            $faq->save();

            DB::commit();
            return redirect('/faq')->with('sukses','Data berhasil Disimpan');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
    }

    public function edit($id){
        $faq = Faq::where('uuid',$id)->firstOrFail();
        return view('faq.edit',compact(['faq']));
    }

    public function update(Request $request,$id){
    	$faq = Faq::where('uuid',$id)->firstOrFail();
    	$this->validate($request,[
            'pertanyaan'=>'required',
            'jawaban'=>'required',
            'kategori'=>'required',
            'urutan'=>'required'
        ]);

        DB::beginTransaction();
        try{

            $faq->pertanyaan 	= $request->pertanyaan;
            $faq->jawaban  		= $request->jawaban;
            $faq->kategori     	= $request->kategori;
            $faq->urutan     	= $request->urutan;
            $faq->save();

            DB::commit();
            return redirect('/faq')->with('sukses','Data berhasil Disimpan');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
    }

    public function delete($id){
        $faq = Faq::where('uuid',$id)->firstOrFail();

        DB::beginTransaction();
        try{
            $faq->delete();
            DB::commit();
            return redirect('/faq')->with('sukses','Data berhasil dihapus');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
        
    }
}
