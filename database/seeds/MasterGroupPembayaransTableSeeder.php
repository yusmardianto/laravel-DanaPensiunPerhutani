<?php

use Illuminate\Database\Seeder;

class MasterGroupPembayaransTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_group_pembayarans')->delete();
        
        \DB::table('master_group_pembayarans')->insert(array (
            0 => 
            array (
                'id' => 2,
                'kode_group' => 'BA',
                'name' => 'Bank Agro',
                'keterangan' => '',
                'created_at' => '2020-04-23 18:17:45',
                'updated_at' => '2020-04-23 18:17:45',
            ),
            1 => 
            array (
                'id' => 3,
                'kode_group' => 'BMRI',
                'name' => 'Bank Mandiri ',
                'keterangan' => '',
                'created_at' => '2020-04-23 18:17:45',
                'updated_at' => '2020-04-23 18:17:45',
            ),
            2 => 
            array (
                'id' => 4,
                'kode_group' => 'BTPN',
                'name' => 'Bank Tabungan Pensiunan',
                'keterangan' => '',
                'created_at' => '2020-04-23 18:17:45',
                'updated_at' => '2020-04-23 18:17:45',
            ),
            3 => 
            array (
                'id' => 5,
                'kode_group' => 'WESEL',
            'name' => 'Pos & Giro (Wesel)',
                'keterangan' => '',
                'created_at' => '2020-04-23 18:17:45',
                'updated_at' => '2020-04-23 18:17:45',
            ),
        ));
        
        
    }
}