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

    Route::prefix('config')->group(function() {

        Route::get('user', 'UserController@index');
    });

    Route::prefix('kepesertaan')->group(function() {
        Route::get('peserta', 'PesertaController@index');
        Route::get('skpensiunan', 'SKPensiunanController@index');
        Route::get('iuranpensiunan', 'IuranPensiunanController@index');
        Route::get('manfaatpensiunan', 'ManfaatPensiunanController@index');
    });

    Route::prefix('investasi')->group(function() {
        Route::get('datatransaksi', 'DataTransaksiController@index');
        Route::get('laporan', 'LaporanController@index');
        Route::get('perubahanstatusorder', 'PerubahanStatusOrderController@index');
        Route::get('statusorder', 'StatusOrderController@index');
        Route::get('suratinstruksi', 'SuratInstruksiController@index');
    });
});
