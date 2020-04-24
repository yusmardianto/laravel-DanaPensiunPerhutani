<?php

use Illuminate\Database\Seeder;

class MasterPeriodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_periodes')->delete();
        
        \DB::table('master_periodes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'periode' => 2004000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            1 => 
            array (
                'id' => 2,
                'periode' => 2005000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            2 => 
            array (
                'id' => 3,
                'periode' => 2006000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            3 => 
            array (
                'id' => 4,
                'periode' => 2007000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            4 => 
            array (
                'id' => 5,
                'periode' => 2008000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            5 => 
            array (
                'id' => 6,
                'periode' => 2009000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            6 => 
            array (
                'id' => 7,
                'periode' => 2010000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            7 => 
            array (
                'id' => 8,
                'periode' => 2011000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            8 => 
            array (
                'id' => 9,
                'periode' => 2012000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            9 => 
            array (
                'id' => 10,
                'periode' => 2013000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            10 => 
            array (
                'id' => 11,
                'periode' => 2014000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
            11 => 
            array (
                'id' => 12,
                'periode' => 2015000,
                'keterangan' => '',
                'created_at' => '2020-04-21 15:52:57',
                'updated_at' => '2020-04-21 15:52:57',
            ),
        ));
        
        
    }
}