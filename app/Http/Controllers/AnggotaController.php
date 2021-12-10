<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Anggota;
use App\Models\Agama;
use DB;

class AnggotaController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){
        return view('anggota.index');
    }

    public function create()
    {
        $model = new Anggota();
        $agama = Agama::all();

        $no_urut = Anggota::max('no_anggota');
        $no = 1;
        if($no_urut){
            $format = sprintf("%03s", abs($no_urut + 1));
        }else{
            $format = sprintf("%03s", $no);
        }
        return view('anggota.form', compact('model','agama','format'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_anggota' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            't4_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama_id' => 'required',
            'kota' => 'required',
            'status' => 'required'

        ]);
        
        DB::beginTransaction();
        try{
            $anggota = new Anggota;
            $anggota->no_anggota    = $request->no_anggota;
            $anggota->nama_lengkap  = $request->nama_lengkap;
            $anggota->t4_lahir      = $request->t4_lahir;
            $anggota->tgl_lahir     = $request->tgl_lahir;
            $anggota->jenis_kelamin = $request->jenis_kelamin;
            $anggota->agama_id      = $request->agama_id;
            $anggota->alamat        = $request->alamat;
            $anggota->kota          = $request->kota;
            $anggota->kode_pos      = $request->kode_pos;
            $anggota->no_hp         = $request->no_hp;
            $anggota->keterangan    = $request->keterangan;
            $anggota->status        = $request->status;
            $anggota->save();

            DB::commit();
            return response()->json(['message' => 'Data Berhasil ditambah']);
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['message' => 'Kesalahan pada Database']);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_anggota' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            't4_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama_id' => 'required',
            'kota' => 'required',
            'status' => 'required'
        ]);

        $model = Anggota::where('uuid',$id)->first();

        $model->update($request->all());

    }

    public function show($id)
    {
        $model = Anggota::with('agama')->where('uuid',$id)->first();
        return view('anggota.detail', compact('model'));
    }

    public function edit($id)
    {
        $model = Anggota::where('uuid',$id)->first();
        $agama = Agama::all();
        return view('anggota.form', compact('model','agama'));
    }

    public function destroy($id)
    {
        $model = Anggota::where('uuid',$id)->first();
        $model->delete();
    }

    public function dataTable()
    {
        $model = Anggota::orderby('id','desc')->get();
        
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('anggota._action', [
                    'model' => $model,
                    'url_detail' => route('anggota-koperasi.show', $model->uuid),
                    'url_edit' => route('anggota-koperasi.edit', $model->uuid),
                    'url_destroy' => route('anggota-koperasi.destroy', $model->uuid)
                ]);
            })
            ->addColumn('ttl', function ($model) {
                return $model->t4_lahir.', '.TanggalAja($model->tgl_lahir);
            })

            ->addColumn('no_anggota', function ($model) {
                return str_pad($model->no_anggota,3,'0',STR_PAD_LEFT);
            })
            ->addColumn('status', function ($model) {
                if($model->status == 'AKTIF'){
                    return '<span class="badge badge-success">AKTIF</span>';
                }else{
                    return '<span class="badge badge-danger">TIDAK AKTIF</span>'; 
                }
                
            })
            
            ->addIndexColumn()
            ->rawColumns(['action','status','ttl'])
            ->make(true);
    }
}
