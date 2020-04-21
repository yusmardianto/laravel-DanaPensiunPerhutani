<?php

use Illuminate\Database\Seeder;

class MasterBanksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('master_banks')->delete();

        \DB::table('master_banks')->insert(array (
            0 =>
            array (
                'id' => 1,
                'kd_bank' => 'AGRO',
                'name' => 'Bank Agro',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'kd_bank' => 'ANZ',
                'name' => 'ANZ Panin Bank',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'kd_bank' => 'BAG',
                'name' => 'Bank Artha Graha',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'kd_bank' => 'BAGI',
                'name' => 'Bank Artha Graha International',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'kd_bank' => 'BALI',
                'name' => 'BANK BALI',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'kd_bank' => 'BBKPS',
                'name' => 'Bank Bukopin Syariah',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'kd_bank' => 'BCA',
                'name' => 'Bank Central Asia',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'kd_bank' => 'BDB',
                'name' => 'Bank Dagang Bali',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'kd_bank' => 'BDMN',
                'name' => 'Bank Danamon',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'kd_bank' => 'BEII',
                'name' => 'BANK BEII',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'kd_bank' => 'BII',
                'name' => 'Bank International Indonesia',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'kd_bank' => 'BJBR',
                'name' => 'Bank Jabar Banten',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'kd_bank' => 'BJBS',
                'name' => 'Bank Jabar Banten Syariah',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            13 =>
            array (
                'id' => 14,
                'kd_bank' => 'BJTG',
                'name' => 'Bank Jateng',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            14 =>
            array (
                'id' => 15,
                'kd_bank' => 'BKP',
                'name' => 'Bank Bukopin',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            15 =>
            array (
                'id' => 16,
                'kd_bank' => 'BM',
                'name' => 'Bank Muamalat',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            16 =>
            array (
                'id' => 17,
                'kd_bank' => 'BMS',
                'name' => 'Bank Mega Syariah',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            17 =>
            array (
                'id' => 18,
                'kd_bank' => 'BNI',
                'name' => 'Bank Negara Indonesia - 46',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            18 =>
            array (
                'id' => 19,
                'kd_bank' => 'BP',
                'name' => 'Bank Bumiputera',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            19 =>
            array (
                'id' => 20,
                'kd_bank' => 'BRI',
                'name' => 'Bank Rakyat Indonesia',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            20 =>
            array (
                'id' => 21,
                'kd_bank' => 'BTN',
                'name' => 'BANK TABUNG NEGARA',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            21 =>
            array (
                'id' => 22,
                'kd_bank' => 'BTPN',
                'name' => 'Bank BTPN',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            22 =>
            array (
                'id' => 23,
                'kd_bank' => 'BTPNSY',
                'name' => 'Bank BTPN Syariah',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            23 =>
            array (
                'id' => 24,
                'kd_bank' => 'CEN',
                'name' => 'Bank Century',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            24 =>
            array (
                'id' => 25,
                'kd_bank' => 'COM',
                'name' => 'Bank Commonwealth',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            25 =>
            array (
                'id' => 26,
                'kd_bank' => 'DKI',
                'name' => 'Bank DKI',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            26 =>
            array (
                'id' => 27,
                'kd_bank' => 'DNM',
                'name' => 'Bank Danamon',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            27 =>
            array (
                'id' => 28,
                'kd_bank' => 'GLB',
                'name' => 'Bank Global Internasional',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            28 =>
            array (
                'id' => 29,
                'kd_bank' => 'JABAR',
                'name' => 'Bank Jabar',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            29 =>
            array (
                'id' => 30,
                'kd_bank' => 'LIPPO',
                'name' => 'BANK LIPPO',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            30 =>
            array (
                'id' => 31,
                'kd_bank' => 'MDR',
                'name' => 'Bank Mandiri',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            31 =>
            array (
                'id' => 32,
                'kd_bank' => 'MEGA',
                'name' => 'Bank Mega',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            32 =>
            array (
                'id' => 33,
                'kd_bank' => 'NIAGA',
                'name' => 'Bank Niaga',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            33 =>
            array (
                'id' => 34,
                'kd_bank' => 'PANIN',
                'name' => 'Bank Panin',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            34 =>
            array (
                'id' => 35,
                'kd_bank' => 'PANSY',
                'name' => 'Bank Panin Syariah',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            35 =>
            array (
                'id' => 36,
                'kd_bank' => 'PRMT',
                'name' => 'Bank Permata',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            36 =>
            array (
                'id' => 37,
                'kd_bank' => 'PUNDI',
                'name' => 'Bank Pundi Indonesia',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            37 =>
            array (
                'id' => 38,
                'kd_bank' => 'RABO',
                'name' => 'Rabo Bank',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            38 =>
            array (
                'id' => 39,
                'kd_bank' => 'TUGU',
                'name' => 'Bank Tugu',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
            39 =>
            array (
                'id' => 40,
                'kd_bank' => 'VIC',
                'name' => 'Bank Victoria',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => NULL,
            ),
        ));
    }
}
