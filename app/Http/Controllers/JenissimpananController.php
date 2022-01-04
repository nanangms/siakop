<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Jenissimpanan;

class JenissimpananController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-master.jenissimpanan.index');
    }

    public function getJenis($id = 0){
        $data = Jenissimpanan::where('id',$id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Jenissimpanan();
        return view('data-master.jenissimpanan.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_jenis' => 'required',
            'nama_jenis' => 'required',
            'posisi' => 'required',
            'rekening_id' => 'required'
        ]);

        $model = Jenissimpanan::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Jenissimpanan::where('uuid',$id)->first();
        return view('data-master.jenissimpanan.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_jenis' => 'required',
            'nama_jenis' => 'required',
            'posisi' => 'required',
            'rekening_id' => 'required'
        ]);

        $model = Jenissimpanan::where('uuid',$id)->first();
        $model->kode_jenis  = $request->kode_jenis;
        $model->nama_jenis  = $request->nama_jenis;
        $model->posisi      = $request->posisi;
        $model->rekening_id = $request->rekening_id;
        $model->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Jenissimpanan::where('uuid',$id)->first();
        $model->delete();
        return response()->json([
                'status' => 'true',
                'messages'=> 'Data Berhasil dihapus']);
    }

    public function dataTable()
    {
        $model = Jenissimpanan::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('data-master.jenissimpanan._action', [
                    'model' => $model,
                    'url_edit' => route('jenissimpanan.edit', $model->uuid),
                    'url_destroy' => route('jenissimpanan.destroy', $model->uuid)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
