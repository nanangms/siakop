<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Menu;
use App\Models\Submenu;
use DB;

class SubmenuController extends Controller
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
    public function index($id)
    {
    	$id_menu = $id;
    	$menu = Menu::where('id',$id)->first();
        return view('setting.submenu.index',compact(['menu','id_menu']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Menu();
        $submenu = Menu::where('id_submenu','0')->get();
        return view('setting.submenu.form', compact('model','submenu'));
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

        DB::beginTransaction();
        try{
            $menu = new Menu;
            $menu->id_menu                = $request->id_menu;
            $menu->nama_menu             = $request->nama_menu;
            $menu->url          = $request->url;
            $menu->icon      = $request->icon;
            $menu->urutan    = $request->urutan;
            $menu->save();
            DB::commit();
            return redirect()->back()->with('sukses','Data berhasil DiTambah');
        }catch (\Exception $e){
        	dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
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
    public function edit($id){
        $model = Menu::where('uuid',$id)->firstOrFail();
        return view('setting.submenu.form',compact(['model']));
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

        $model = Menu::where('uuid',$id)->firstOrFail();

        DB::beginTransaction();
        try{
            $model->update($request->all());
            DB::commit();
            return redirect()->back()->with('sukses','Data berhasil Dirubah');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
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

    public function dataTable($id)
    {
        $model = Menu::where('id_menu',$id)->get();
        //dd($model);
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return '<button data-toggle="modal" data-target-id="'.$model->uuid.'" data-target="#ShowEDIT" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></button>

                    <button class="btn btn-danger btn-xs hapus" submenu-name="'.$model->nama_menu.'" submenu-id="'.$model->uuid.'" title="Delete"><i class="fa fa-trash"></i></button>';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete($id){
        $menu = Menu::where('uuid',$id)->firstOrFail();
        DB::beginTransaction();
        try{
            $menu->delete();
            DB::commit();
            return response()->json(['success'=>'Data berhasil dihapus!']);
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['success'=>'Data Gagal dihapus!']);
        }
        
    }
}
