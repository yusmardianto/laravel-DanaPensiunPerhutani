<?php

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

Route::get('/', function () {
    return redirect('login');
});

Route::bind('id', function ($id) {
    return Hasher::decode($id);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::prefix('config')->group(function() {
        //module
        Route::get('module', 'ModuleController@index');
        Route::any('module/ajax-list', 'ModuleController@ajaxList');
        Route::get('module/create', 'ModuleController@getCreate');
        Route::post('module/create', 'ModuleController@postCreate');
        Route::get('module/detail/{id}', 'ModuleController@getDetail');
        Route::any('module/ajax-permission/{id}', 'ModuleController@ajaxPermission');
        Route::get('module/add-permission/{id}','ModuleController@getAddPermission');
        Route::post('module/add-permission/{id}', 'ModuleController@postAddPermission');
        Route::post('module/delete-permission/{id}/{permissionId}', 'ModuleController@postDeletePermission');
        Route::get('module/edit/{id}', 'ModuleController@getEdit');
        Route::post('module/edit/{id}', 'ModuleController@postEdit');
        Route::post('module/delete/{id}', 'ModuleController@delete');
        //role
        Route::get('role', 'RoleController@index');
        Route::any('role/ajax-list', 'RoleController@ajaxList');
        Route::get('role/create', 'RoleController@getCreate');
        Route::post('role/create', 'RoleController@postCreate');
        Route::get('role/detail/{id}', 'RoleController@getDetail');
        Route::any('role/ajax-user/{id}', 'RoleController@ajaxUser');
        Route::get('role/add-user/{id}', 'RoleController@getAddUser');
        Route::post('role/add-user/{id}', 'RoleController@postAddUser');
        Route::post('role/delete-user/{id}/{roleId}', 'RoleController@postDeleteUser');
        Route::get('role/edit/{id}', 'RoleController@getEdit');
        Route::post('role/edit/{id}', 'RoleController@postEdit');
        Route::post('role/delete/{id}', 'RoleController@delete');
        //user
        Route::get('user', 'UserController@index');
        Route::any('user/ajax-list', 'UserController@ajaxList');
        Route::get('user/create', 'UserController@getCreate');
        Route::post('user/create', 'UserController@postCreate');
        Route::get('user/detail/{id}', 'UserController@getDetail');
        Route::any('user/ajax-role/{id}', 'UserController@ajaxRole');
        Route::get('user/add-role/{id}', 'UserController@getAddRole');
        Route::post('user/add-role/{id}', 'UserController@postAddRole');
        Route::post('user/delete-role/{id}/{roleId}', 'UserController@postDeleteRole');
        Route::get('user/edit/{id}', 'UserController@getEdit');
        Route::post('user/edit/{id}', 'UserController@postEdit');
        Route::post('user/delete/{id}', 'UserController@delete');
    });

    Route::prefix('kepesertaan')->group(function() {
        //daftar peserta
        Route::get('peserta', 'PesertaController@index');
        //sk pensiunan
        Route::get('skpensiunan', 'SKPensiunanController@index');
        //iuran pensiunan
        Route::get('iuranpensiunan', 'IuranPensiunanController@index');
        //manfaat pensiunan
        Route::get('manfaatpensiunan', 'ManfaatPensiunanController@index');
    });

    Route::prefix('investasi')->group(function() {
        //data transaksi
        Route::get('datatransaksi', 'DataTransaksiController@index');
        //status order
        Route::get('statusorder', 'StatusOrderController@index');
        //perubahan status order
        Route::get('perubahanstatusorder', 'PerubahanStatusOrderController@index');
        //surat instruksi
        Route::get('suratinstruksi', 'SuratInstruksiController@index');
    });

    Route::prefix('keuangan')->group(function() {
        //transaksi pemasukan kas
        Route::get('pemasukan', 'PemasukanController@index');
        //transaksi pengeluaran kas
        Route::get('pengeluaran', 'PengeluaranController@index');
    });

    Route::prefix('masters')->group(function() {
        Route::get('karyawan', 'KaryawanController@index');
        Route::any('karyawan/ajax-list', 'KaryawanController@ajaxList');
    });
});
