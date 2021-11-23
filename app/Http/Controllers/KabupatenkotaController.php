<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Kabupatenkota;

class KabupatenkotaController extends Controller
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
        return view('data-master.kabupaten.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Kabupatenkota();
        return view('data-master.kabupaten.form', compact('model'));
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
            'nama_kab_kota' => 'required'
        ]);

        $model = Kabupatenkota::create($request->all());
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
        $model = Kabupatenkota::findOrFail($id);
        return view('data-master.kabupaten.form', compact('model'));
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
            'nama_kab_kota' => 'required'
        ]);

        $model = Kabupatenkota::where('id',$id)->first();
		$model->nama_kab_kota      = $request->nama_kab_kota;
        $model->seo_kab_kota       = null;
        $model->update();

        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Kabupatenkota::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Kabupatenkota::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('data-master.kabupaten._action', [
                    'model' => $model,
                    'url_edit' => route('kabupaten.edit', $model->id),
                    'url_destroy' => route('kabupaten.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
