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

if (! function_exists('Tanggal')) {
	 /**
	 * TanggalID
	 *
	 * @param mixed $tanggal
	 * @return void
	 */
	 function Tanggal($tanggal) {
	 $value = Carbon\Carbon::parse($tanggal);
	 $parse = $value->locale('id');
	 return $parse->translatedFormat('d-m-Y');
	 }
}

if (! function_exists('TanggalWaktu')) {
	 /**
	 * TanggalID
	 *
	 * @param mixed $tanggal
	 * @return void
	 */
	 function TanggalWaktu($tanggal) {
	 $value = Carbon\Carbon::parse($tanggal);
	 $parse = $value->locale('id');
	 return $parse->translatedFormat('d-m-Y h:i');
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

function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}