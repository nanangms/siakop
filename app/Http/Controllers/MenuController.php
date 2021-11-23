<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Menu;
use App\Models\Submenu;

class MenuController extends Controller
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
        return view('setting.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Menu();
        $menu = Menu::where('id_menu','0')->get();
        return view('setting.menu.form', compact('model','menu'));
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
            'id_menu' => 'required',
            'nama_menu' => 'required',
            'url' => 'required',
            'icon' => 'required',
            'urutan' => 'required'
        ]);

        $model = Menu::create($request->all());
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
        $model = Menu::findOrFail($id);
        return view('setting.menu.form', compact('model'));
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
            'id_menu' => 'required',
            'nama_menu' => 'required',
            'url' => 'required',
            'icon' => 'required',
            'urutan' => 'required'
        ]);

        $model = Menu::findOrFail($id);

        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Menu::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Menu::where('id_menu',0)->get();
        //dd($model);
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('setting.menu._action', [
                    'model' => $model,
                    'url_edit' => route('menu.edit', $model->id),
                    'url_destroy' => route('menu.destroy', $model->id)
                ]);
            })

            ->addColumn('jml_submenu', function ($model) {
                $jml = Menu::where('id_menu',$model->id)->count();
                return '<a href="/setting/submenu/'.$model->id.'" class="btn btn-info btn-sm">'.$jml.'</a>';
            })

            ->addIndexColumn()
            ->rawColumns(['action','jml_submenu'])
            ->make(true);
    }
}
