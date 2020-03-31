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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

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
        //laporan transaksi
        Route::get('laporan', 'LaporanController@index');
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

    Route::prefix('config')->group(function() {
        //user
        Route::get('user', 'UserController@index');
        Route::any('user/ajax-list', 'UserController@ajaxList');
        Route::get('user/create','UserController@getCreate');
        Route::post('user/create','UserController@postCreate');

        //role
        Route::get('role', 'RoleController@index');
        Route::any('role/ajax-list', 'RoleController@ajaxList');
        Route::get('role/create','RoleController@create');
    });

});
