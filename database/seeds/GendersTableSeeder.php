<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genders')->delete();
        
        \DB::table('genders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kode' => '1',
                'name' => 'Laki-laki',
                'created_at' => '2020-05-27 00:12:27',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'kode' => '2',
                'name' => 'Perempuan',
                'created_at' => '2020-05-27 00:12:27',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'kode' => '3',
                'name' => 'Tidak Disebutkan',
                'created_at' => '2020-05-27 00:12:27',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}