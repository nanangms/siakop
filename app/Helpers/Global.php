<?php
use App\Models\User;

function menu(){
    $role = auth()->user()->role_id;
    $p = DB::table('role_menu as a')
        ->select('a.*','c.*')
        ->leftjoin('menu as c','a.menu_id','c.id')
        ->where('a.role_id',$role)
        ->where('c.id_menu',0)
        ->orderBy('c.urutan', 'asc')->get();

    return $p;
}
function submenu($menu_utama){
    $role = auth()->user()->role_id;
    $submenu = DB::table('role_menu as a')
        ->select('a.*','c.*')
        ->leftjoin('menu as c','a.menu_id','c.id')
        ->where('a.role_id',$role)
        ->where('c.id_menu',$menu_utama)
        ->orderBy('c.urutan', 'asc')->get();
    return $submenu;
}

function jml_submenu($menu_utama){
    $role = auth()->user()->role_id;
    $submenu = DB::table('role_menu as a')
        ->select('a.*','c.*')
        ->leftjoin('menu as c','a.menu_id','c.id')
        ->where('a.role_id',$role)
        ->where('c.id_menu',$menu_utama)
        ->orderBy('c.urutan', 'asc')->count();
    return $submenu;
}
if (! function_exists('setActive')) {
	 /**
	 * setActive
	 *
	 * @param mixed $path
	 * @return void
	 */
	 function setActive($path)
	 {
	 return Request::is($path . '*') ? ' active' : '';
	 }
}

if (! function_exists('openMenu')) {
	 /**
	 * openMenu
	 *
	 * @param mixed $path
	 * @return void
	 */
	 function openMenu($path)
	 {
	 return Request::is($path . '*') ? ' menu-open' : '';
	 }
}
if (! function_exists('TanggalID')) {
	 /**
	 * TanggalID
	 *
	 * @param mixed $tanggal
	 * @return void
	 */
	 function TanggalID($tanggal) {
	 $value = Carbon\Carbon::parse($tanggal);
	 $parse = $value->locale('id');
	 return $parse->translatedFormat('l, d F Y');
	 }
}

if (! function_exists('TanggalAja')) {
	 /**
	 * TanggalID
	 *
	 * @param mixed $tanggal
	 * @return void
	 */
	 function TanggalAja($tanggal) {
	 $value = Carbon\Carbon::parse($tanggal);
	 $parse = $value->locale('id');
	 return $parse->translatedFormat('d F Y');
	 }
}

if (! function_exists('nama_bulan')) {
	 /**
	 * TanggalID
	 *
	 * @param mixed $tanggal
	 * @return void
	 */
	 function nama_bulan_pendek($tanggal) {
	 $value = Carbon\Carbon::parse($tanggal);
	 $parse = $value->locale('id');
	 return $parse->translatedFormat('M');
	 }
}

if (! function_exists('tglnya')) {
	 /**
	 * TanggalID
	 *
	 * @param mixed $tanggal
	 * @return void
	 */
	 function tglnya($tanggal) {
	 $value = Carbon\Carbon::parse($tanggal);
	 $parse = $value->locale('id');
	 return $parse->translatedFormat('d');
	 }
}

if (! function_exists('tahunnya')) {
	 /**
	 * TanggalID
	 *
	 * @param mixed $tanggal
	 * @return void
	 */
	 function tahunnya($tanggal) {
	 $value = Carbon\Carbon::parse($tanggal);
	 $parse = $value->locale('id');
	 return $parse->translatedFormat('Y');
	 }
}


function kode_acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
    	$pos = rand(0, strlen($karakter)-1);
    	$string .= $karakter{$pos};
    }
    return $string;
}