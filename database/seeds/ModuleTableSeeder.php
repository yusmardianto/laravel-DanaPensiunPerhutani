<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('module')->delete();

        \DB::table('module')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Role',
                'detail' => 'Untuk konfigurasi role / tipe pengguna',
                'created_at' => '2020-04-07 05:36:09',
                'updated_at' => '2020-04-07 05:36:09',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'User',
                'detail' => 'Untuk konfigurasi user / daftar pengguna',
                'created_at' => '2020-04-07 05:36:45',
                'updated_at' => '2020-04-07 05:36:45',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Master Data',
                'detail' => 'Input Master Data',
                'created_at' => '2020-04-07 05:36:47',
                'updated_at' => '2020-04-07 05:36:47',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Kepesertaan',
                'detail' => 'Input data kepesertaan',
                'created_at' => '2020-04-07 05:37:00',
                'updated_at' => '2020-04-07 05:37:00',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Pengembangan dan Investasi',
                'detail' => 'Input data transaksi pengembangan dan investasi',
                'created_at' => '2020-04-07 11:24:23',
                'updated_at' => '2020-04-07 11:24:23',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Keuangan',
                'detail' => 'Input data transaksi keuangan',
                'created_at' => '2020-04-13 09:46:52',
                'updated_at' => '2020-04-13 09:46:52',
            ),
        ));
    }
}
