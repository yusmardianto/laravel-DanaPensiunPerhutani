<?php

use Illuminate\Database\Seeder;

class JenisTransaksiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('jenis_transaksis')->delete();

        \DB::table('jenis_transaksis')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Extra Manfaat Pensiun Sekaligus',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Extra Manfaat Pensiun Uang Muka',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Rapel Manfaat Pensiun Bulanan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Extra Manfaat Pensiun Bulanan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'MP Bulanan - Potongan Persatuan Pensiunan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'MP Bulanan - Potongan Koperasi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'MP Bulanan - Potongan Pinjaman',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Extra MP Bulanan - Lain',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'MP Bulanan - Potongan Lain 1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'MP Bulanan - Potongan Lain 2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
