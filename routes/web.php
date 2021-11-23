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
//Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/button', function () {
//     return view('email_verifikasi');
// });


Route::get('/reload-captcha','App\Http\Controllers\IndexController@reloadCaptcha');
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/akses_terbatas', function () {
    return view('akses_terbatas');
});

Auth::routes(['register' => false]);

Route::group(['middleware'=>['auth','checkRole:Admin,Super Admin']],function(){
    Route::group(['prefix'=>'profil'], function(){
        Route::get('/{id}', 'UserController@profil');
        Route::post('/{id}/update', 'UserController@update_profil');
        Route::post('/ganti_password', 'UserController@ganti_password_profil');
    });
});

Route::group(['middleware'=>['auth','checkRole:Admin,Super Admin']],function(){
    Route::get('/home', 'HomeController@index');

    Route::group(['prefix'=>'user'], function(){
        Route::get('/', 'UserController@index');
        Route::get('/gudep', 'UserController@user_gudep');
        Route::get('/gudep/{id}/verifikasi', 'UserController@verifikasi');
        Route::post('/gudep/{id}/verifikasi_submit', 'UserController@verifikasi_submit');
        Route::post('/tambah', 'UserController@add_user');
        Route::get('/{id}/delete', 'UserController@delete');
        Route::get('/{id}/edit', 'UserController@edit');
        Route::post('/{id}/update', 'UserController@update');
        Route::post('/{id}/ganti_password', 'UserController@ganti_password');
    });

    Route::group(['prefix'=>'data-master'], function(){
        Route::resource('/kabupaten',KabupatenkotaController::class);
        Route::resource('/kategori',KategoriController::class);
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

    Route::get('/role/datatable', [App\Http\Controllers\RoleController::class, 'dataTable'])->name('table.role');
    Route::get('/role_menu/datatable', [App\Http\Controllers\RolemenuController::class, 'dataTable'])->name('table.role_menu');
    Route::get('/table/kabupaten', [App\Http\Controllers\KabupatenkotaController::class, 'dataTable'])->name('table.kabupaten');
    Route::get('/table/menu', [App\Http\Controllers\MenuController::class, 'dataTable'])->name('table.menu');
    Route::get('/table/user', 'UserController@dataTable')->name('table.user');
    Route::get('/table/kategori', [App\Http\Controllers\KategoriController::class, 'dataTable'])->name('table.kategori');
});