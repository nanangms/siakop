<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Bungapinjaman;

class BungapinjamanController extends Controller
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
        return view('data-master.bungapinjaman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBunga($id = 0){
        $data = Bungapinjaman::where('jangka_waktu',$id)->first();
        return response()->json($data);
    }
    public function create()
    {
        $model = new Bungapinjaman();
        return view('data-master.bungapinjaman.form', compact('model'));
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
            'jangka_waktu' => 'required',
            'nilai_bunga' => 'required'
        ]);

        $model = Bungapinjaman::create($request->all());
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
        $model = Bungapinjaman::findOrFail($id);
        return view('data-master.bungapinjaman.form', compact('model'));
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
            'jangka_waktu' => 'required',
            'nilai_bunga' => 'required'
        ]);

        $bungapinjaman = Bungapinjaman::findOrFail($id);

        $bungapinjaman->jangka_waktu = $request->jangka_waktu;
        $bungapinjaman->nilai_bunga = $request->nilai_bunga;
        $bungapinjaman->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Bungapinjaman::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Bungapinjaman::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('data-master.bungapinjaman._action', [
                    'model' => $model,
                    'url_edit' => route('bungapinjaman.edit', $model->id),
                    'url_destroy' => route('bungapinjaman.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
