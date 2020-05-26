<?php

use Illuminate\Database\Seeder;

class ReligionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('religions')->delete();
        
        \DB::table('religions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Islam',
                'created_at' => '2020-05-22 14:09:03',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Katolik',
                'created_at' => '2020-05-22 14:09:03',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Protestan',
                'created_at' => '2020-05-22 14:09:03',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Hindu',
                'created_at' => '2020-05-22 14:09:03',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Budha',
                'created_at' => '2020-05-22 14:09:03',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Tidak Disebutkan',
                'created_at' => '2020-05-22 14:09:03',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}