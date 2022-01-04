<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Agama;

class AgamaController extends Controller
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
        return view('data-master.agama.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Agama();
        return view('data-master.agama.form', compact('model'));
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
            'nama_agama' => 'required'
        ]);

        $model = Agama::create($request->all());
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
        $model = Agama::where('uuid',$id)->first();
        return view('data-master.agama.form', compact('model'));
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
            'nama_agama' => 'required'
        ]);

        $model = Agama::where('uuid',$id)->first();
        $model->nama_agama = $request->nama_agama;
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
        $model = Agama::where('uuid',$id)->first();
        $model->delete();
        return response()->json([
                'status' => 'true',
                'messages'=> 'Data Berhasil dihapus']);
    }

    public function dataTable()
    {
        $model = Agama::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('data-master.agama._action', [
                    'model' => $model,
                    'url_edit' => route('agama.edit', $model->uuid),
                    'url_destroy' => route('agama.destroy', $model->uuid)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
