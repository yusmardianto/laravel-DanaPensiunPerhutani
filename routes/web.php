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
    Route::prefix('masters')->group(function() {
        //karyawan
        Route::get('karyawan', 'KaryawanController@index');
        Route::any('karyawan/ajax-list', 'KaryawanController@ajaxList');
        Route::get('karyawan/create', 'KaryawanController@getCreate');
        Route::post('karyawan/create', 'KaryawanController@postCreate');
        Route::get('karyawan/detail/{id}', 'KaryawanController@getDetail');
        Route::get('karyawan/edit/{id}', 'KaryawanController@getEdit');
        Route::post('karyawan/edit/{id}', 'KaryawanController@postEdit');
        Route::post('karyawan/destroy/{id}', 'KaryawanController@destroy');

        //peserta
        Route::get('peserta', 'PesertaController@index');
        Route::any('peserta/ajax-list', 'PesertaController@ajaxList');
        Route::get('peserta/detail/{id}', 'PesertaController@getDetail');
        Route::get('peserta/edit/{id}', 'PesertaController@getEdit');
        Route::post('peserta/edit/{id}', 'PesertaController@postEdit');
        Route::post('peserta/destroy/{id}', 'PesertaController@destroy');

        //status
        Route::get('status', 'MasterStatusController@index');
        Route::any('status/ajax-list', 'MasterStatusController@ajaxList');
        Route::get('status/create', 'MasterStatusController@getCreate');
        Route::post('status/create', 'MasterStatusController@postCreate');
        Route::get('status/detail/{id}', 'MasterStatusController@getDetail');
        Route::get('status/edit/{id}', 'MasterStatusController@getEdit');
        Route::post('status/edit/{id}', 'MasterStatusController@postEdit');
        Route::post('status/destroy/{id}', 'MasterStatusController@destroy');

        //bank
        Route::get('bank', 'MasterBankController@index');
        Route::any('bank/ajax-list', 'MasterBankController@ajaxList');
        Route::get('bank/create', 'MasterBankController@getCreate');
        Route::post('bank/create', 'MasterBankController@postCreate');
        Route::get('bank/detail/{id}', 'MasterBankController@getDetail');
        Route::get('bank/edit/{id}', 'MasterBankController@getEdit');
        Route::post('bank/edit/{id}', 'MasterBankController@postEdit');
        Route::post('bank/destroy/{id}', 'MasterBankController@destroy');

        //golongan
        Route::get('golongan', 'GolonganController@index');
        Route::any('golongan/ajax-list', 'GolonganController@ajaxList');
        Route::get('golongan/create', 'GolonganController@getCreate');
        Route::post('golongan/create', 'GolonganController@postCreate');
        Route::get('golongan/detail/{id}', 'GolonganController@getDetail');
        Route::get('golongan/edit/{id}', 'GolonganController@getEdit');
        Route::post('golongan/edit/{id}', 'GolonganController@postEdit');
        Route::post('golongan/destroy/{id}', 'GolonganController@destroy');

        //voucher
        Route::get('voucher', 'VoucherController@index');
        Route::get('voucher/create', 'VoucherController@getCreate');
        Route::post('voucher/create', 'VoucherController@postCreate');
        Route::any('voucher/ajax-list', 'VoucherController@ajaxList');
        Route::get('voucher/detail/{id}', 'VoucherController@getDetail');
        Route::get('voucher/edit/{id}', 'VoucherController@getEdit');
        Route::post('voucher/edit/{id}', 'VoucherController@postEdit');
        Route::post('voucher/destroy/{id}', 'VoucherController@destroy');

        //unit kerja
        Route::get('unit-kerja', 'MasterUnitKerjaController@index');
        Route::any('unit-kerja/ajax-list', 'MasterUnitKerjaController@ajaxList');
        Route::get('unit-kerja/create', 'MasterUnitKerjaController@getCreate');
        Route::post('unit-kerja/create', 'MasterUnitKerjaController@postCreate');
        Route::get('unit-kerja/detail/{id}', 'MasterUnitKerjaController@getDetail');
        Route::get('unit-kerja/edit/{id}', 'MasterUnitKerjaController@getEdit');
        Route::post('unit-kerja/edit/{id}', 'MasterUnitKerjaController@postEdit');
        Route::post('unit-kerja/destroy/{id}', 'MasterUnitKerjaController@destroy');

        //pejabat kerja
        Route::get('pejabat-kerja', 'PejabatKerjaController@index');
        Route::get('pejabat-kerja/create', 'PejabatKerjaController@getCreate');
        Route::post('pejabat-kerja/create', 'PejabatKerjaController@postCreate');
        Route::any('pejabat-kerja/ajax-list', 'PejabatKerjaController@ajaxList');
        Route::get('pejabat-kerja/detail/{id}', 'PejabatKerjaController@getDetail');
        Route::get('pejabat-kerja/edit/{id}', 'PejabatKerjaController@getEdit');
        Route::post('pejabat-kerja/edit/{id}', 'PejabatKerjaController@postEdit');
        Route::post('pejabat-kerja/destroy/{id}', 'PejabatKerjaController@destroy');

        //periode
        Route::get('periode', 'PeriodeController@index');
        Route::get('periode/create', 'PeriodeController@getCreate');
        Route::post('periode/create', 'PeriodeController@postCreate');
        Route::any('periode/ajax-list', 'PeriodeController@ajaxList');
        Route::get('periode/detail/{id}', 'PeriodeController@getDetail');
        Route::get('periode/edit/{id}', 'PeriodeController@getEdit');
        Route::post('periode/edit/{id}', 'PeriodeController@postEdit');
        Route::post('periode/destroy/{id}', 'PeriodeController@destroy');
    });

    Route::prefix('kepesertaan')->group(function() {
        Route::get('peserta-aktif', 'PesertaAktifController@index');
        Route::any('peserta-aktif/ajax-list', 'PesertaAktifController@ajaxList');
        Route::get('peserta-aktif/create', 'PesertaAktifController@getCreate');
        Route::post('peserta-aktif/create', 'PesertaAktifController@postCreate');
        Route::get('peserta-aktif/detail/{id}', 'PesertaAktifController@getDetail');
        Route::get('peserta-aktif/edit/{id}', 'PesertaAktifController@getEdit');
        Route::post('peserta-aktif/edit/{id}', 'PesertaAktifController@postEdit');
        Route::post('peserta-aktif/delete/{id}', 'PesertaAktifController@destroy');

        //sk pensiunan
        Route::get('skpensiunan', 'SKPensiunanController@index');
        Route::get('skpensiunan/create', 'SKPensiunanController@getCreate');
        Route::post('skpensiunan/create', 'SKPensiunanController@postCreate');
        Route::any('skpensiunan/ajax-list', 'SKPensiunanController@ajaxList');
        Route::get('skpensiunan/detail/{id}', 'SKPensiunanController@getDetail');
        Route::get('skpensiunan/edit/{id}', 'SKPensiunanController@getEdit');
        Route::post('skpensiunan/edit/{id}', 'SKPensiunanController@postEdit');
        Route::post('skpensiunan/delete/{id}', 'SKPensiunanController@destroy');
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
        Route::any('pemasukan/ajax-list', 'PemasukanController@ajaxList');
        Route::get('pemasukan/create', 'PemasukanController@getCreate');
        Route::post('pemasukan/create', 'PemasukanController@postCreate');

        //transaksi pengeluaran kas
        Route::get('pengeluaran', 'PengeluaranController@index');
    });

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
        Route::post('role/delete-user/{id}/{userId}', 'RoleController@postDeleteUser');
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
});
