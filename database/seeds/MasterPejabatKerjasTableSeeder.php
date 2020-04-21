<?php

use Illuminate\Database\Seeder;

class MasterPejabatKerjasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('master_pejabat_kerjas')->delete();

        \DB::table('master_pejabat_kerjas')->insert(array (
            0 =>
            array (
                'id' => 7,
                'kode_pejabat_kerja' => 'PPHT',
                'nama_pejabat_kerja' => 'Perum Perhutani',
                'keterangan' => 'hgfhgfhg',
                'created_at' => '2020-04-21 15:21:13',
                'updated_at' => '2020-04-21 15:22:07',
            ),
        ));


    }
}
