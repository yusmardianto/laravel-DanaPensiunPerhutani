<?php

use Illuminate\Database\Seeder;

class MasterVouchersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_vouchers')->delete();
        
        \DB::table('master_vouchers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kode_voucher' => 'AIB',
                'nama_voucher' => 'Pembelian Aktiva Tetap',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'kode_voucher' => 'AIH',
                'nama_voucher' => 'HASIL SEWA AKTIVA IVESTASI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'kode_voucher' => 'AIJ',
                'nama_voucher' => 'Penjualan Aktiva Investasi',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'kode_voucher' => 'AIK',
                'nama_voucher' => 'KONTRAK SEWA AKTIVA INVESTASI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'kode_voucher' => 'APH-AT',
                'nama_voucher' => 'offset pelunasan utang aktiva tetap',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'kode_voucher' => 'APH-DEP',
                'nama_voucher' => 'ALOKASI PELUNASAN DEPOSITO',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'kode_voucher' => 'APH-MP',
                'nama_voucher' => 'OFFSET PELUNASAN HUTANG MANFAAT PENSIUN',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'kode_voucher' => 'APH-OBL',
                'nama_voucher' => 'ALOKASI PELUNASAN HUTANG OBLIGASI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'kode_voucher' => 'APH-PL',
                'nama_voucher' => 'ALOKASI PELUNASAN PENEMPATAN LANSUNG',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'kode_voucher' => 'APH-RD',
                'nama_voucher' => 'ALOKASI PELUNASAN HUTANG REKSADANA',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'kode_voucher' => 'APH-SHM',
                'nama_voucher' => 'ALOKASI PELUNASAN HUTANG SAHAM',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'kode_voucher' => 'APP-ATI',
                'nama_voucher' => 'ALOKASI PELUNASAN PIUTANG AKTIVA TATAP INVESTASI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'kode_voucher' => 'APP-DEP',
                'nama_voucher' => 'ALOKASI PELUNASAN PIUTANG DEPOSITO',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'kode_voucher' => 'APP-DT',
                'nama_voucher' => 'ALOKASI PELUNASAN PIUTANG DEVIDEN TUNAI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'kode_voucher' => 'APP-IP',
                'nama_voucher' => 'OFFSET PELUNASAN PIUTANG IURAN PENSIUN',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'kode_voucher' => 'APP-OBL',
                'nama_voucher' => 'ALOKASI PELUNASAN PIUTANG OBLIGASI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'kode_voucher' => 'APP-RD',
                'nama_voucher' => 'ALOKASI PELUNASAN PIUTANG REKSADANA',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'kode_voucher' => 'APP-SHM',
                'nama_voucher' => 'ALOKASI PELUNASAN PIUTANG SAHAM',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'kode_voucher' => 'BDC',
                'nama_voucher' => 'Bukti Penerimaan Bank BNI Custody',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'kode_voucher' => 'BDG',
                'nama_voucher' => 'Bukti Penerimaan Bank BTPN',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'kode_voucher' => 'BDJ',
                'nama_voucher' => 'Bukti Penerimaan Bank Mandiri Jamsostek 01',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'kode_voucher' => 'BDK',
                'nama_voucher' => 'Bukti Penerimaan Bank Mandiri Jamsostek 02',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'kode_voucher' => 'BIN',
                'nama_voucher' => '',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'kode_voucher' => 'BK',
                'nama_voucher' => 'Bukti Bank Keluar',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'kode_voucher' => 'BKB',
                'nama_voucher' => 'Bank Keluar BNI s/a Bahana TCW',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'kode_voucher' => 'BKC',
                'nama_voucher' => 'Bukti Pengeluaran BNI Custody',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'kode_voucher' => 'BKD',
                'nama_voucher' => 'Bank Keluar Evergreen D 106',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'kode_voucher' => 'BKDA',
                'nama_voucher' => 'Bank Keluar BNI s/a Danareksa',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'kode_voucher' => 'BKDM',
                'nama_voucher' => 'Bank Keluar Evergreen  106',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'kode_voucher' => 'BKDT',
                'nama_voucher' => 'Bank Kelur Evergreen DT 106',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'kode_voucher' => 'BKE',
                'nama_voucher' => 'Bank Keluar Evergreen',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'kode_voucher' => 'BKG',
                'nama_voucher' => 'Bukti Pengeluaran Bank  BTPN',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'kode_voucher' => 'BKHPAM',
                'nama_voucher' => 'Bukti Pengeluaran Bank Mandiri S/A HPAM',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'kode_voucher' => 'BKJ',
                'nama_voucher' => 'Bukti Pengeluaran Mandiri Jamsostek 01',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'kode_voucher' => 'BKK',
                'nama_voucher' => 'Bukti Pengeluaran Mandiri  Jamsostek 02',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'kode_voucher' => 'BKM',
                'nama_voucher' => 'Bukti Pengeluaran Bank Mandiri Custody',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'kode_voucher' => 'BKM2',
                'nama_voucher' => 'Bukti Pengeluaran Bank Mandiri Custody 2',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'kode_voucher' => 'BKMB',
                'nama_voucher' => 'Bukti Pengeluaran Bank Mandiri s/a BHN',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'kode_voucher' => 'BKMC',
                'nama_voucher' => 'Bukti Pengeluaran Bank Mega Capital',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'kode_voucher' => 'BKMD',
                'nama_voucher' => 'Bukti Pengeluaran Bank Mandiri s/a DNR',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'kode_voucher' => 'BKMS',
                'nama_voucher' => 'Bukti Pengeluaran Bank Mandiri s/a SCH',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'kode_voucher' => 'BKMT1',
                'nama_voucher' => 'Bukti Pengeluaran Bank Mandiri s/a TrimI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'kode_voucher' => 'BKMTII',
                'nama_voucher' => 'Bukti Pengeluaran Bank Mandiri s/a TrimII',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'kode_voucher' => 'BKPC',
                'nama_voucher' => 'Bukti Pengeluran Bank Mandiri S/A PCI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'kode_voucher' => 'BKR',
                'nama_voucher' => 'Bank Keluar BRI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'kode_voucher' => 'BKS',
                'nama_voucher' => 'Bank Keluar BNI s/a Schroder',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'kode_voucher' => 'BKT',
                'nama_voucher' => 'Bank Keluar BNI s/a Trimegah',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'kode_voucher' => 'BKT2',
                'nama_voucher' => 'Bukti Pengeluaran BNI s/a Trimegah 2',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'kode_voucher' => 'BM',
                'nama_voucher' => 'Bukti Bank Masuk',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'kode_voucher' => 'BMB',
                'nama_voucher' => 'Bank Masuk BNI s/a Bahana TCW',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'kode_voucher' => 'BMD',
                'nama_voucher' => 'Bank Masuk Evergreen D 106',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'kode_voucher' => 'BMDA',
                'nama_voucher' => 'Bank Masuk BNI s/a Danareksa',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'kode_voucher' => 'BMDM',
                'nama_voucher' => 'Bank Masuk Evergreen DM 106',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'kode_voucher' => 'BMDT',
                'nama_voucher' => 'Bank Masuk Evergreen DT 106',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'kode_voucher' => 'BME',
                'nama_voucher' => 'Bank Masuk Evergreen',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'kode_voucher' => 'BMHPAM',
                'nama_voucher' => 'Bukti Penerimaan Bank mandiri S/A HPAM',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'kode_voucher' => 'BMM',
                'nama_voucher' => 'Bukti Penerimaan Bank Mandiri Custody',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'kode_voucher' => 'BMM2',
                'nama_voucher' => 'Bukti Penerimaan Bank Mandiri Custody 2',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'kode_voucher' => 'BMMB',
                'nama_voucher' => 'Bukti Penerimaan Bank Mandiri s/a BHN',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'kode_voucher' => 'BMMC',
                'nama_voucher' => 'Bukti Penerimaan Bank Mega Capital',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'kode_voucher' => 'BMMD',
                'nama_voucher' => 'Bukti Penerimaan Bank Mandiri s/a DNR',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'kode_voucher' => 'BMMS',
                'nama_voucher' => 'Bukti Penerimaan Bank Mandiri s/a Sch',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'kode_voucher' => 'BMMTI',
                'nama_voucher' => 'Bukti Penerimaan Bank Mandiri s/a TrimI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'kode_voucher' => 'BMMTII',
                'nama_voucher' => 'Bukti Penerimaan Bank Mandiri s/a TrimII',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'kode_voucher' => 'BMPC',
                'nama_voucher' => 'Bukti Penerimaan bank Mandiri S/A PCI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'kode_voucher' => 'BMR',
                'nama_voucher' => 'Bank Masuk BRI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'kode_voucher' => 'BMS',
                'nama_voucher' => 'Bank Masuk BNI s/a Schroder',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'kode_voucher' => 'BMT',
                'nama_voucher' => 'Bank Masuk BNI s/a Trimegah',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'kode_voucher' => 'BMT2',
                'nama_voucher' => 'Bukti Penerimaan BNI s/a Trimegah 2',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'kode_voucher' => 'BTS-I',
            'nama_voucher' => 'Penerimaan Bank Transit (Bank Penampungan)',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'kode_voucher' => 'BTS-O',
            'nama_voucher' => 'Pengeluaran Bank Transit  (Bank Penampungan)',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'kode_voucher' => 'DCL',
                'nama_voucher' => 'JURNAL PENUTUPAN DEPOSITO',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'kode_voucher' => 'DOC',
                'nama_voucher' => 'DEPOSITO ON CALL',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'kode_voucher' => 'DRO',
                'nama_voucher' => 'DEPOSITO ROLL OVER',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'kode_voucher' => 'DT',
                'nama_voucher' => 'Trx Dividen Tunai',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'kode_voucher' => 'FIP',
                'nama_voucher' => 'Form IP',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'kode_voucher' => 'HMP',
                'nama_voucher' => 'Hutang Manfaat Pensiun',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'kode_voucher' => 'HP',
                'nama_voucher' => 'Trx Harga Pasar',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'kode_voucher' => 'HPR',
                'nama_voucher' => 'HARGA PASAR REKSADANA',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'kode_voucher' => 'HPS',
                'nama_voucher' => 'HARGA PASAR SAHAM',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'kode_voucher' => 'INRAPEL',
                'nama_voucher' => 'Rapel Iuran Normal',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'kode_voucher' => 'JA',
                'nama_voucher' => 'Jurnal Investasi',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'kode_voucher' => 'JAI',
                'nama_voucher' => 'Jurnal Akrual Iuran',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'kode_voucher' => 'JAP',
                'nama_voucher' => 'JURNAL ACRUAL',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'kode_voucher' => 'JAS',
                'nama_voucher' => 'JURNAL ACRUAL SPI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'kode_voucher' => 'JB',
                'nama_voucher' => 'Jurnal Balik',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'kode_voucher' => 'JBI',
                'nama_voucher' => 'Jurnal Balik Iuran',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'kode_voucher' => 'JBP',
                'nama_voucher' => 'JURNAL BALIK PENDAPATAN',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'kode_voucher' => 'JBS',
                'nama_voucher' => 'JURNAL BALIK SPI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'kode_voucher' => 'JI',
                'nama_voucher' => 'Jurnal Investasi',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'kode_voucher' => 'JMI',
                'nama_voucher' => 'JURNAL MEMORIAL INVESTASI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'kode_voucher' => 'JP',
                'nama_voucher' => 'Jurnal Penyesuaian ',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'kode_voucher' => 'JPI',
                'nama_voucher' => 'PENDAPATAN INVESTASI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'kode_voucher' => 'JU',
                'nama_voucher' => 'Jurnal Umum',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'kode_voucher' => 'KK',
                'nama_voucher' => 'Bukti Pengeluaran Kas',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'kode_voucher' => 'KM',
                'nama_voucher' => 'Bukti Penerimaan Kas',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'kode_voucher' => 'KMP',
                'nama_voucher' => 'Kalkulasi Manfaat Pensiun',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'kode_voucher' => 'KP',
                'nama_voucher' => 'SPP Bidang Kepesertaan ',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'kode_voucher' => 'KPST',
                'nama_voucher' => 'SPP KEPESERTAAN',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'kode_voucher' => 'KU',
                'nama_voucher' => 'SPP Bidang Keuangan',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'kode_voucher' => 'KV',
                'nama_voucher' => 'Trx Kurs Valuta',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'kode_voucher' => 'MMA',
                'nama_voucher' => 'Memorial Audit',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'kode_voucher' => 'MMS',
                'nama_voucher' => 'MEMORIAL ',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'kode_voucher' => 'MPR',
                'nama_voucher' => 'Manfaat Pensiun - Rapel',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'kode_voucher' => 'MPX',
                'nama_voucher' => 'Manfaat Pensiun - Extra',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'kode_voucher' => 'MPXS',
                'nama_voucher' => 'Manfaat Pensiun - Extra Sekaligus',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'kode_voucher' => 'OB',
                'nama_voucher' => 'OBLIGASI BELI',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'kode_voucher' => 'OJ',
                'nama_voucher' => 'OBLIGASI JUAL',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'kode_voucher' => 'PAH',
                'nama_voucher' => 'Koreksi Peserta Aktif - sisi History saja',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'kode_voucher' => 'PAHUPL',
                'nama_voucher' => 'Koreksi Peserta Aktif - via Upload',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'kode_voucher' => 'PAK',
                'nama_voucher' => 'Koreksi Peserta Aktif - All',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'kode_voucher' => 'PAS',
                'nama_voucher' => 'Koreksi Peserta Aktif - sisi Statis saja',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'kode_voucher' => 'PAT',
                'nama_voucher' => 'Tambah Peserta Aktif Baru',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'kode_voucher' => 'PAUP',
                'nama_voucher' => 'Updating Peserta Aktif via Upload',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'kode_voucher' => 'PAUP2',
                'nama_voucher' => 'Koreksi Peserta Aktif via Upload-2',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'kode_voucher' => 'PIN',
                'nama_voucher' => 'Piutang Iuran Normal',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'kode_voucher' => 'PLB',
                'nama_voucher' => 'Transaksi Penyertaan Penempatan Langsung',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'kode_voucher' => 'PLJ',
                'nama_voucher' => '',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'kode_voucher' => 'RB',
                'nama_voucher' => 'JURNAL PENEMPATAN REKSADANA',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'kode_voucher' => 'RBG',
                'nama_voucher' => 'Reklas Bugdet',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'kode_voucher' => 'RJ',
                'nama_voucher' => 'JURNAL PELEPASAN REKSADANA',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'kode_voucher' => 'RT',
                'nama_voucher' => 'SPP Bidang Rumah Tangga',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'kode_voucher' => 'SB',
                'nama_voucher' => 'JURNAL PEMBELIAN SAHAM',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'kode_voucher' => 'SJ',
                'nama_voucher' => 'JURNAL PELEPASAN SAHAM',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'kode_voucher' => 'SKE',
                'nama_voucher' => 'EDITING DATA TRANSAKSI PENSIUN',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'kode_voucher' => 'SKEUP',
                'nama_voucher' => 'EDITING DATA TRANSAKSI PENSIUN via UPLOAD',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'kode_voucher' => 'SKMM',
                'nama_voucher' => 'SK Pensiun',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'kode_voucher' => 'SKMP',
                'nama_voucher' => 'SK Manfaat Pensiun',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'kode_voucher' => 'SKPP',
                'nama_voucher' => 'SK Pensiun: Pensiun -> Pensiun',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'kode_voucher' => 'TD',
                'nama_voucher' => 'TIME DEPOSIT',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'kode_voucher' => 'TPA',
                'nama_voucher' => 'Tarif Penyusutan Aktiva Tetap',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'kode_voucher' => 'TPAT',
                'nama_voucher' => 'Tarif Penyusutan Aktiva Tetap',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'kode_voucher' => 'UM',
                'nama_voucher' => 'SPP Bidang Umum',
                'keterangan' => '',
                'created_at' => '2020-04-21 07:18:46',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}