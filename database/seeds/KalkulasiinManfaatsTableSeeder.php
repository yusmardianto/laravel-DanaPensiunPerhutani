<?php

use Illuminate\Database\Seeder;

class KalkulasiinManfaatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('kalkulasiin_manfaats')->delete();

        \DB::table('kalkulasiin_manfaats')->insert(array(
            0 =>
            array(
                'id' => 1,
                'jenis_pembayaran' => 'MP Kolektif',
                'kode_voucher' => 'KMP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'jenis_pembayaran' => 'MPS Kolektif',
                'kode_voucher' => 'KMPS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
