<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Role;
use App\Models\Role_menu;

class RoleController extends Controller
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
        return view('setting.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Role();
        return view('setting.role.form', compact('model'));
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
            'nama_role' => 'required'
        ]);

        $model = Role::create($request->all());
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
        $model = Role::findOrFail($id);
        return view('setting.role.form', compact('model'));
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
            'nama_role' => 'required'
        ]);

        $model = Role::findOrFail($id);

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
        $model = Role::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Role::query();
        return DataTables::of($model)
        ->addColumn('action', function ($model) {
            return view('setting.role._action', [
                'model' => $model,
                'url_edit' => route('role.edit', $model->id),
                'url_destroy' => route('role.destroy', $model->id)
            ]);
        })
        ->addColumn('jml_menu', function ($model) {
            $menu = Role_menu::where('role_id',$model->id)->count();
            return '<a href="/setting/role/menu/'.$model->id.'" class="btn btn-xs btn-info">'.$menu.'</a>';
        })
        ->addIndexColumn()
        ->rawColumns(['action','jml_menu'])
        ->make(true);
    }
}
