<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'IndexController@index');
Route::get('/register-akun-anggota', 'IndexController@register');
Route::post('/register-anggota/kirim', 'IndexController@register_submit');
Route::get('/register-anggota/berhasil', 'IndexController@berhasil');
Route::get('/cek-anggota/{nik}', 'IndexController@cek_anggota');
Route::get('/register-anggota/confirmation/{code}', 'IndexController@verify')->name('register.confirmation');


Route::get('/reload-captcha','App\Http\Controllers\IndexController@reloadCaptcha');
// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/akses_terbatas', function () {
    return view('akses_terbatas');
});
Route::get('/notfound', function () {
    return view('frontend.notfound');
});

Auth::routes(['register' => false]);

Route::group(['middleware'=>['auth','checkRole:Admin,Super Admin,Anggota']],function(){
    Route::group(['prefix'=>'profil'], function(){
        Route::get('/{id}', 'UserController@profil');
        Route::post('/{id}/update', 'UserController@update_profil');
        Route::post('/ganti_password', 'UserController@ganti_password_profil');
    });
});

Route::group(['middleware'=>['auth','checkRole:Admin,Super Admin']],function(){
    Route::get('/home', 'HomeController@index');

    Route::resource('anggota-koperasi',AnggotaController::class);
    Route::get('/get/anggota/{id}', 'AnggotaController@getAnggota')->name('getAnggota');
    Route::get('/get/bunga/{id}', 'BungapinjamanController@getBunga')->name('getBunga');
    Route::get('/get/jenis/{id}', 'JenissimpananController@getJenis')->name('getJenissimpanan');

    //Simpanan
    Route::group(['prefix'=>'simpanan'], function(){
        Route::get('/','SimpananController@index');
        Route::get('/cetak-nota/{id}','SimpananController@cetak_nota');
        Route::get('/cetak-nota/{id}/print','SimpananController@print_nota');
        Route::get('/tambah','SimpananController@create');
        Route::get('/perorangan','SimpananController@perorangan');
        Route::get('/transaksi','SimpananController@transaksi');
        Route::post('/tambah/submit','SimpananController@store');
        Route::get('/{id}/delete','SimpananController@delete');
        Route::get('/{id}/edit','SimpananController@edit');
        Route::get('/{anggota_id}/detail','SimpananController@detail');
        Route::post('/{id}/update','SimpananController@update');
        Route::get('/table/simpanan', 'SimpananController@dataTable')->name('table.simpanan');
        Route::get('/table/simpanan-anggota/{id}', [App\Http\Controllers\SimpananController::class, 'simpanan_anggota']);
        Route::get('/table/simpanan-perorangan', [App\Http\Controllers\SimpananController::class, 'DataTableperorangan'])->name('table.simpanan-perorangan');
    });

    //Pinjaman
    Route::group(['prefix'=>'pinjaman'], function(){
        Route::get('/data-pinjaman','PinjamanController@index');
        Route::get('/tambah','PinjamanController@tambah');
        Route::get('/tambah/{id}','PinjamanController@tambahjenispinjaman');
        Route::get('/table/pinjaman', 'PinjamanController@dataTable')->name('table.pinjaman');
    }); 

    Route::group(['prefix'=>'user'], function(){
        //Administrator
        Route::get('/admin', 'UserController@index');
        Route::post('/tambah', 'UserController@add_user');
        Route::get('/{id}/delete', 'UserController@delete');
        Route::get('/{id}/edit', 'UserController@edit');
        Route::post('/{id}/update', 'UserController@update');
        Route::post('/{id}/ganti_password', 'UserController@ganti_password');

        //Anggota Koperasi
        Route::get('/anggota', 'UserController@anggota');
        Route::get('/anggota/{id}/verifikasi', 'UserController@verifikasi');
        Route::post('/anggota/{id}/verifikasi_submit', 'UserController@verifikasi_submit');
        Route::get('/anggota/{id}/detail', 'UserController@anggota_detail');
    });

    Route::group(['prefix'=>'data-master'], function(){
        Route::resource('/kabupaten',KabupatenkotaController::class);
        Route::resource('/kategori',KategoriController::class);
        Route::resource('/agama',AgamaController::class);
        Route::resource('/jenispinjaman',JenispinjamanController::class);
        Route::resource('/jenissimpanan',JenissimpananController::class);
        Route::resource('/bungapinjaman',BungapinjamanController::class);

        Route::get('/identitas-koperasi', 'IdentitaskoperasiController@index');
        Route::post('/identitas-koperasi/update', 'IdentitaskoperasiController@update');
    });
    
    Route::group(['prefix'=>'setting'], function(){
        Route::resource('/menu', MenuController::class);
        Route::resource('/role', RoleController::class);
        Route::resource('/role_menu',RolemenuController::class);
        Route::get('/submenu/{id}', 'SubmenuController@index');
        Route::get('/submenu/edit/{id}', 'SubmenuController@edit');
        Route::post('/submenu/tambah', 'SubmenuController@store');
        Route::post('/submenu/update/{id}', 'SubmenuController@update');
        Route::get('/submenu/{id}/delete', 'SubmenuController@delete');
        Route::get('/submenu/datatable/{id}', 'SubmenuController@dataTable')->name('table.submenu');
        Route::get('/role/menu/{id}', 'RolemenuController@role_menu');
        Route::get('/role/menu/datatable/{id}', 'RolemenuController@role_menu_dataTable');
    });

    Route::group(['prefix'=>'faq'], function(){
        Route::get('/','FaqController@index');
        Route::post('/tambah','FaqController@create');
        Route::get('/table', 'FaqController@dataTable')->name('table.faq');
        Route::get('/{id}/delete','FaqController@delete');
        Route::get('/{id}/edit','FaqController@edit');
        Route::post('/{id}/update','FaqController@update');
    }); 

    Route::get('/table/anggota', 'AnggotaController@dataTable')->name('table.anggotakoperasi');
    Route::get('/table/user', 'UserController@dataTable')->name('table.user');
    Route::get('/table/user/anggota', 'UserController@dataTable_anggota')->name('table.user_anggota');

    //Data Master dan setting
    Route::get('/role/datatable', [App\Http\Controllers\RoleController::class, 'dataTable'])->name('table.role');
    Route::get('/role_menu/datatable', [App\Http\Controllers\RolemenuController::class, 'dataTable'])->name('table.role_menu');
    Route::get('/table/kabupaten', [App\Http\Controllers\KabupatenkotaController::class, 'dataTable'])->name('table.kabupaten');
    Route::get('/table/menu', [App\Http\Controllers\MenuController::class, 'dataTable'])->name('table.menu');
    Route::get('/table/kategori', [App\Http\Controllers\KategoriController::class, 'dataTable'])->name('table.kategori');
    Route::get('/table/agama', [App\Http\Controllers\AgamaController::class, 'dataTable'])->name('table.agama');
    Route::get('/table/jenispinjaman', [App\Http\Controllers\JenispinjamanController::class, 'dataTable'])->name('table.jenispinjaman');
    Route::get('/table/jenissimpanan', [App\Http\Controllers\JenissimpananController::class, 'dataTable'])->name('table.jenissimpanan');
    Route::get('/table/bungapinjaman', [App\Http\Controllers\BungapinjamanController::class, 'dataTable'])->name('table.bungapinjaman');
});