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

    Route::prefix('masters')->group(function () {

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

        //group pembayaran
        Route::get('group-pembayaran', 'GroupPembayaranController@index');
        Route::get('group-pembayaran/create', 'GroupPembayaranController@getCreate');
        Route::post('group-pembayaran/create', 'GroupPembayaranController@postCreate');
        Route::any('group-pembayaran/ajax-list', 'GroupPembayaranController@ajaxList');
        Route::get('group-pembayaran/detail/{id}', 'GroupPembayaranController@getDetail');
        Route::get('group-pembayaran/edit/{id}', 'GroupPembayaranController@getEdit');
        Route::post('group-pembayaran/edit/{id}', 'GroupPembayaranController@postEdit');
        Route::post('group-pembayaran/destroy/{id}', 'GroupPembayaranController@destroy');

        //unit pembayaran
        Route::get('unit-pembayaran', 'UnitPembayaranController@index');
        Route::get('unit-pembayaran/create', 'UnitPembayaranController@getCreate');
        Route::post('unit-pembayaran/create', 'UnitPembayaranController@postCreate');
        Route::any('unit-pembayaran/ajax-list', 'UnitPembayaranController@ajaxList');
        Route::get('unit-pembayaran/detail/{id}', 'UnitPembayaranController@getDetail');
        Route::get('unit-pembayaran/edit/{id}', 'UnitPembayaranController@getEdit');
        Route::post('unit-pembayaran/edit/{id}', 'UnitPembayaranController@postEdit');
        Route::post('unit-pembayaran/destroy/{id}', 'UnitPembayaranController@destroy');

        //Alasan
        Route::get('alasan', 'AlasanPensiunController@index');
        Route::get('alasan/create', 'AlasanPensiunController@getCreate');
        Route::post('alasan/create', 'AlasanPensiunController@postCreate');
        Route::any('alasan/ajax-list', 'AlasanPensiunController@ajaxList');
        Route::get('alasan/detail/{id}', 'AlasanPensiunController@getDetail');
        Route::get('alasan/edit/{id}', 'AlasanPensiunController@getEdit');
        Route::post('alasan/edit/{id}', 'AlasanPensiunController@postEdit');
        Route::post('alasan/destroy/{id}', 'AlasanPensiunController@destroy');

        //Tanggungan
        Route::get('tanggungan', 'MasterTanggunganController@index');
        Route::get('tanggungan/create', 'MasterTanggunganController@getCreate');
        Route::post('tanggungan/create', 'MasterTanggunganController@postCreate');
        Route::any('tanggungan/ajax-list', 'MasterTanggunganController@ajaxList');
        Route::get('tanggungan/detail/{id}', 'MasterTanggunganController@getDetail');
        Route::get('tanggungan/edit/{id}', 'MasterTanggunganController@getEdit');
        Route::post('tanggungan/edit/{id}', 'MasterTanggunganController@postEdit');
        Route::post('tanggungan/destroy/{id}', 'MasterTanggunganController@destroy');

    });

    Route::prefix('kepesertaan')->group(function () {

        Route::get('peserta-aktif', 'PesertaAktifController@index');
        Route::any('peserta-aktif/ajax-list', 'PesertaAktifController@ajaxList');
        Route::get('peserta-aktif/create', 'PesertaAktifController@getCreate');
        Route::post('peserta-aktif/create', 'PesertaAktifController@postCreate');
        Route::get('peserta-aktif/detail/{id}', 'PesertaAktifController@getDetail');
        Route::get('peserta-aktif/edit/{id}', 'PesertaAktifController@getEdit');
        Route::post('peserta-aktif/edit/{id}', 'PesertaAktifController@postEdit');
        Route::post('peserta-aktif/delete/{id}', 'PesertaAktifController@destroy');
        Route::get('peserta-aktif/ajax-byGolongan/{golId}', 'PesertaAktifController@getByGolongan');
        Route::get('peserta-aktif/ajax-byStatus/{statId}', 'PesertaAktifController@getByStatus');
        Route::post('peserta-aktif/upload', 'PesertaAktifController@uploadExcel');

        //sk pensiunan
        Route::prefix('skpensiunan')->group(function () {
            //Transaksi SK Pensiunan
            Route::get('transaksiskpensiun', 'SKPensiunanController@index');
            Route::get('transaksiskpensiun/create', 'SKPensiunanController@getCreate');
            Route::post('transaksiskpensiun/create', 'SKPensiunanController@postCreate');
            Route::any('transaksiskpensiun/ajax-list', 'SKPensiunanController@ajaxList');
            Route::get('transaksiskpensiun/detail/{id}', 'SKPensiunanController@getDetail');
            Route::get('transaksiskpensiun/edit/{id}', 'SKPensiunanController@getEdit');
            Route::post('transaksiskpensiun/edit/{id}', 'SKPensiunanController@postEdit');
            Route::post('transaksiskpensiun/destroy/{id}', 'SKPensiunanController@destroy');

            //Penetapan SK Manfaat Pensiun
            Route::get('manfaatpensiun/create', 'PenetapanSKMPController@getCreate');
            Route::any('manfaatpensiun/ajax-list', 'PenetapanSKMPController@ajaxList');
            Route::post('manfaatpensiun/create', 'PenetapanSKMPController@postCreate');
            Route::get('manfaatpensiun/detail/{id}', 'PenetapanSKMPController@getDetail');
            Route::get('manfaatpensiun/edit/{id}', 'PenetapanSKMPController@getEdit');
            Route::post('manfaatpensiun/edit/{id}', 'PenetapanSKMPController@postEdit');
            Route::post('manfaatpensiun/destroy/{id}', 'PenetapanSKMPController@destroy');

            //Penetapan Penerima Manfaat Pensiun
            Route::get('penerimamanfaat/create', 'PenetapanPenerimaMPController@getCreate');
            Route::any('penerimamanfaat/ajax-list', 'PenetapanPenerimaMPController@ajaxList');
            Route::post('penerimamanfaat/create', 'PenetapanPenerimaMPController@postCreate');
            Route::get('penerimamanfaat/edit/{id}', 'PenetapanPenerimaMPController@getEdit');
            Route::post('penerimamanfaat/edit/{id}', 'PenetapanPenerimaMPController@postEdit');
            Route::post('penerimamanfaat/destroy/{id}', 'PenetapanPenerimaMPController@destroy');

            //Simulasi Manfaat Pensiunan
            Route::get('simulasimp', 'SimulasiManfaatPensiunController@index');
            Route::get('simulasimp/create', 'SimulasiManfaatPensiunController@getCreate');
            // Route::post('simulasimp/create', 'SimulasiManfaatPensiunController@postCreate');
            Route::any('simulasimp/ajax-list', 'SimulasiManfaatPensiunController@ajaxList');

        });

        //iuran pensiunan
        Route::prefix('iuranpensiunan')->group(function () {

            Route::get('rapel-extra', 'RapelExtraController@index');
            Route::any('rapel-extra/ajax-list', 'RapelExtraController@ajaxList');
            Route::get('rapel-extra/create', 'RapelExtraController@getCreate');
            Route::post('rapel-extra/create', 'RapelExtraController@postCreate');
            Route::get('rapel-extra/detail/{id}', 'RapelExtraController@getDetail');
            Route::get('rapel-extra/edit/{id}', 'RapelExtraController@getEdit');
            Route::post('rapel-extra/edit/{id}', 'RapelExtraController@postEdit');
            Route::post('rapel-extra/delete/{id}', 'RapelExtraController@destroy');
            Route::post('rapel-extra/upload', 'RapelExtraController@uploadExcel');

        });

        //manfaat pensiunan
        Route::prefix('manfaatpensiunan')->group(function(){
            //rapelextra
            Route::get('rapelextramanfaat', 'RapelExtraManfaatController@index');
            Route::any('rapelextramanfaat/ajax-list', 'RapelExtraManfaatController@ajaxList');
            Route::get('rapelextramanfaat/create', 'RapelExtraManfaatController@getCreate');
            Route::post('rapelextramanfaat/create', 'RapelExtraManfaatController@postCreate');
            Route::get('rapelextramanfaat/detail/{id}', 'RapelExtraManfaatController@getDetail');
            Route::get('rapelextramanfaat/edit/{id}', 'RapelExtraManfaatController@getEdit');
            Route::post('rapelextramanfaat/edit/{id}', 'RapelExtraManfaatController@postEdit');
            Route::post('rapelextramanfaat/delete/{id}', 'RapelExtraManfaatController@destroy');
            Route::post('rapelextramanfaat/hitung/{id}', 'RapelExtraManfaatController@postcreate');
            Route::post('rapelextramanfaat/upload', 'RapelExtraManfaatController@uploadExcel');
            Route::get('rapelextramanfaat/hitung/{id}', 'RapelExtraManfaatController@getHitung');
            Route::post('rapelextramanfaat/hitung/{id}', 'RapelExtraManfaatController@postHitung');

            //kalkulasi daftar
            Route::get('kalkulasidaftarmp', 'KalkulasiDaftarManfaatController@index');
            Route::any('kalkulasidaftarmp/ajax-list', 'KalkulasiDaftarManfaatController@ajaxList');
            Route::get('kalkulasidaftarmp/create', 'KalkulasiDaftarManfaatController@getCreate');
            Route::post('kalkulasidaftarmp/create', 'KalkulasiDaftarManfaatController@postCreate');
            Route::get('kalkulasidaftarmp/detail/{id}', 'KalkulasiDaftarManfaatController@getDetail');
            Route::get('kalkulasidaftarmp/hitung/{id}', 'KalkulasiDaftarManfaatController@getHitung');

            //pph21
            Route::get('pph21manfaat', 'Pph21ManfaatController@index');
            Route::any('pph21manfaat/ajax-list', 'Pph21ManfaatController@ajaxList');
            Route::get('pph21manfaat/create', 'Pph21ManfaatController@getCreate');
            Route::post('pph21manfaat/create', 'Pph21ManfaatController@postCreate');
            Route::get('pph21manfaat/detail/{id}', 'Pph21ManfaatController@getDetail');
            Route::get('pph21manfaat/edit/{id}', 'Pph21ManfaatController@getEdit');
            Route::post('pph21manfaat/edit/{id}', 'Pph21ManfaatController@postEdit');
            Route::post('pph21manfaat/delete/{id}', 'Pph21ManfaatController@destroy');

            //koreksi
            Route::get('koreksimanfaat', 'KoreksiManfaatController@index');
            Route::any('koreksimanfaat/ajax-list', 'KoreksiManfaatController@ajaxList');
            Route::get('koreksimanfaat/create', 'KoreksiManfaatController@getCreate');
            Route::post('koreksimanfaat/create', 'KoreksiManfaatController@postCreate');
        });

    });

    Route::prefix('investasi')->group(function () {

        //data transaksi
        Route::get('datatransaksi', 'DataTransaksiController@index');

        //status order
        Route::get('statusorder', 'StatusOrderController@index');

        //perubahan status order
        Route::get('perubahanstatusorder', 'PerubahanStatusOrderController@index');

        //surat instruksi
        Route::get('suratinstruksi', 'SuratInstruksiController@index');

    });

    Route::prefix('keuangan')->group(function () {

        //transaksi pemasukan kas
        Route::get('pemasukan', 'PemasukanController@index');
        Route::any('pemasukan/ajax-list', 'PemasukanController@ajaxList');
        Route::get('pemasukan/create', 'PemasukanController@getCreate');
        Route::post('pemasukan/create', 'PemasukanController@postCreate');
        Route::get('pemasukan/detail/{id}', 'PemasukanController@getDetail');
        Route::get('pemasukan/edit/{id}', 'PemasukanController@getEdit');
        Route::post('pemasukan/edit/{id}', 'PemasukanController@postEdit');
        Route::post('pemasukan/destroy/{id}', 'PemasukanController@destroy');

        //transaksi pengeluaran kas
        Route::get('pengeluaran', 'PengeluaranController@index');
        Route::any('pengeluaran/ajax-list', 'PengeluaranController@ajaxList');
        Route::get('pengeluaran/create', 'PengeluaranController@getCreate');
        Route::post('pengeluaran/create', 'PengeluaranController@postCreate');
        Route::get('pengeluaran/detail/{id}', 'PengeluaranController@getDetail');
        Route::get('pengeluaran/edit/{id}', 'PengeluaranController@getEdit');
        Route::post('pengeluaran/edit/{id}', 'PengeluaranController@postEdit');
        Route::post('pengeluaran/destroy/{id}', 'PengeluaranController@destroy');

    });

    Route::prefix('config')->group(function () {

        //module
        Route::get('module', 'ModuleController@index');
        Route::any('module/ajax-list', 'ModuleController@ajaxList');
        Route::get('module/create', 'ModuleController@getCreate');
        Route::post('module/create', 'ModuleController@postCreate');
        Route::get('module/detail/{id}', 'ModuleController@getDetail');
        Route::any('module/ajax-permission/{id}', 'ModuleController@ajaxPermission');
        Route::get('module/add-permission/{id}', 'ModuleController@getAddPermission');
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
