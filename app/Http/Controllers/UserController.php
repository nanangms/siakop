<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Role;
use DB;
use File;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function index()
    {
    	if(auth()->user()->role->nama_role == "Super Admin"){
          $role = Role::select('role.id','role.nama_role')->get();
        }else{
          $role = Role::select('role.id','role.nama_role')->whereIn('id', array(2,3))->get();
        }
    	
        return view('user.index',compact(['role']));
    }

    public function anggota()
    {
        return view('user.anggota');
    }

    public function dataTable()
    {
        if(auth()->user()->role->nama_role == "Super Admin"){
          $user = User::select('users.*')->with(['role'])->orderby('id','desc')->get();
        }elseif(auth()->user()->role->nama_role == "Admin"){
          $user = User::select('users.*')->with('role')->whereIn('role_id', [2, 4, 5])->orderby('id','desc')->get();  
        }
        
        return DataTables::of($user)
            ->addColumn('action', function ($user) {
            if(auth()->user()->role->nama_role == "Super Admin"){
                return '<button data-toggle="modal" data-target-id="'.$user->uuid.'" data-target="#ShowEDIT" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-xs hapus" user-name="'.$user->name.'" user-id="'.$user->uuid.'" title="Delete"><i class="fa fa-trash"></i></button>';
                }elseif(auth()->user()->role->nama_role == "Admin"){
                    return '<button data-toggle="modal" data-target-id="'.$user->uuid.'" data-target="#ShowEDIT" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></button>';
                }else{
                    return 'No Action';
                }
            })
            ->addColumn('nama_role', function ($user) {
                return $user->role->nama_role;
            })

            ->addColumn('nama', function ($user) {
                return '<img src="'.$user->getAvatarProfil().'" alt="avatar" style="object-fit: cover; position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%;"> | '.$user->name;
            })
            ->addColumn('status', function ($user) {
                if($user->is_active == 'Y'){
                    return '<span class="badge badge-success">Aktif</span>';
                }else{
                    return '<span class="badge badge-danger">Tidak Aktif</span>'; 
                }
                
            })
            
            ->addIndexColumn()
            ->rawColumns(['action','nama_role','status','nama'])
            ->make(true);
    }

    public function dataTable_anggota()
    {
        $user = User::where('role_id', '3')->orderby('id','desc')->get();  
        
        return DataTables::of($user)
            ->addColumn('action', function ($user) {
                $detail = '<button data-toggle="modal" data-target-id="'.$user->uuid.'" data-target="#ShowDetail" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-search"></i></button>';
                $edit = '<button data-toggle="modal" data-target-id="'.$user->uuid.'" data-target="#ShowEDIT" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></button>';
                $verifikasi = '<button data-toggle="modal" data-target-id="'.$user->uuid.'" data-target="#ShowVerivikasi" class="btn btn-primary btn-xs" title="Verifikasi"><i class="fa fa-edit" aria-hidden="true"></i></button>';
                $hapus = '<button class="btn btn-danger btn-xs hapus" user-name="'.$user->name.'" user-id="'.$user->uuid.'" title="Delete"><i class="fa fa-trash"></i></button>';
                
                return $detail.' '.$verifikasi;
                
            })

            ->addColumn('nama', function ($user) {
                return '<img src="'.$user->getAvatarProfil().'" alt="avatar" style="object-fit: cover; position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%;"> | '.$user->name;
            })
            ->addColumn('status', function ($user) {
                if($user->is_active == 'Y'){
                    return '<span class="badge badge-success">Aktif</span>';
                }else{
                    return '<span class="badge badge-danger">Tidak Aktif</span>'; 
                }
                
            })

            ->addColumn('verifikasi', function ($user) {
                if($user->verifikasi == 'Y'){
                    return '<span class="badge badge-success">Terverifikasi</span>';
                }elseif($user->verifikasi == 'N'){
                    return '<span class="badge badge-danger">Ditolak</span>'; 
                }else{
                    return '<span class="badge badge-warning">Belum Diverifikasi</span>'; 
                }
                
            })
            
            ->addIndexColumn()
            ->rawColumns(['action','nama_role','status','nama','verifikasi'])
            ->make(true);
    }

    public function add_user(Request $request){
        $this->validate($request,[
            'name'      =>'required',
            'email'     =>'required|email|unique:users',
            'password'  =>'required|min:8',
            'role_id'   =>'required',
            'is_active' =>'required'
        ]);

        DB::beginTransaction();
        try{
            $user = new User;
            $user->anggota_id     = '0';
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->no_hp        = $request->no_hp;
            $user->password     = Hash::make($request->password);
            $user->role_id      = $request->role_id;
            $user->is_active    = $request->is_active;
            $user->verifikasi   = 'Y';
            $user->save();
            DB::commit();
            return redirect('/user')->with('sukses','User berhasil Disimpan');
        }catch (\Exception $e){
        	//dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal',$e->getMessage());
        }
    }

    public function delete($id){
    	$user = User::where('uuid',$id)->first();
        $user->delete();
        return redirect('/user')->with('sukses','Data Berhasil dihapus');
    }

    public function edit($id){
    	if(auth()->user()->role->nama_role == "Super Admin"){
          $role = Role::select('role.id','role.nama_role')->get();
        }else{
          $role = Role::select('role.id','role.nama_role')->whereIn('id', array(2,3))->get();
        }
    	$user = User::where('uuid',$id)->first();
        return view('user.edit',compact(['role','user']));
    }

    public function update(Request $request,$id){
        $user = User::where('uuid',$id)->first();

        DB::beginTransaction();
        try{
            $user->name        = $request->name;
            $user->email       = $request->email;
            $user->role_id 	   = $request->role_id;
        	$user->is_active   = $request->is_active;
            $user->save();

            DB::commit();
            return redirect()->back()->with('sukses','Data Berhasil diupdate');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
        
    }

    public function verifikasi_submit(Request $request,$id){
        $user = User::where('uuid',$id)->first();
        DB::beginTransaction();
        try{
            $user->is_active    = $request->is_active;
            $user->verifikasi   = $request->verifikasi;
            $user->save();
            DB::commit();
            return redirect('/user/anggota')->with('sukses','Data Berhasil disimpan');
        }catch (\Exception $e){
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
        
    }
    public function profil($id){
        $user = User::where('uuid',$id)->firstOrfail();
        return view('user.profil',['user' => $user]);
    }

    public function changepassword($id){
        $user = User::where('uuid',$id)->firstOrfail();
        return view('user.ganti_password',['user' => $user]);
    }

    public function update_profil(Request $request,$id){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'photo'=>'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);
        $user = User::where('uuid',$id)->firstOrfail();

        if ($request->hasFile('photo')) {
            $foto = $request->file('photo');
            $image_name1 = str_replace(' ', '_', $request->name).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            if($user->photo != ""){
                File::delete('images/profil/'.$user->photo);
            }

            $image_resize = Image::make($foto->getRealPath());
            $image_resize->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $image_resize->save(public_path('images/profil/'.$image_name1));

            DB::beginTransaction();
            try{
                $user->name        = $request->name;
                $user->email       = $request->email;
                $user->no_hp       = $request->no_hp;
                $user->photo       = $image_name1;
                $user->save();

                DB::commit();
                return redirect('/profil/'.auth()->user()->uuid)->with('sukses','Profil Berhasil Di Update');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }else{
            DB::beginTransaction();
            try{
                $user->name        = $request->name;
                $user->email       = $request->email;
                $user->no_hp       = $request->no_hp;
                $user->save();
                DB::commit();
                return redirect('/profil/'.auth()->user()->uuid)->with('sukses','Profil Berhasil Di Update');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }


    }

    public function ganti_password_profil(Request $request){
        $user = Auth::user();
        $userPassword = $user->password;
        if (!Hash::check($request->password_lama, $userPassword)) {
            return back()->withErrors(['password_lama'=>'Password Lama Salah']);
        }

        $this->validate($request,[
            'password_lama' => 'required',
            'password'      => 'required|min:8',
            'password_baru' => 'required|min:8|required_with:password|same:password',
        ]);
        
        //$user = User::where('uuid',$id)->firstOrfail();
        $user->password = Hash::make($request->password_baru);
        $user->update();
        
        return redirect('/profil/'.auth()->user()->uuid)->with('sukses','Password Berhasil dirubah');
    }

    public function ganti_password(Request $request,$id){
        $user = User::where('uuid',$id)->firstOrfail();
    
        $this->validate($request,[
            'password' => 'required|min:8',
            'password_baru' => 'required|min:8|required_with:password|same:password',
        ]);

        $user->password = Hash::make($request->password_baru);
        $user->update();
        
        return redirect('/user')->with('sukses','Password Berhasil dirubah');
    }

    public function verifikasi($id){
        $user = User::where('uuid',$id)->first();
        return view('user.verifikasi',compact(['user']));
    }

    public function anggota_detail($id){
        $user = User::with('anggota')->where('uuid',$id)->first();
        return view('user.detail_anggota',compact('user'));
    }
}
