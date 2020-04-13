<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Supervisor',
                'guard_name' => 'web',
                'created_at' => '2020-04-07 04:56:32',
                'updated_at' => '2020-04-07 04:56:32',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kepesertaan',
                'guard_name' => 'web',
                'created_at' => '2020-04-07 05:39:15',
                'updated_at' => '2020-04-07 05:39:15',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pengembangan dan Investasi',
                'guard_name' => 'web',
                'created_at' => '2020-04-07 11:25:13',
                'updated_at' => '2020-04-07 11:25:13',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Keuangan',
                'guard_name' => 'web',
                'created_at' => '2020-04-13 09:48:17',
                'updated_at' => '2020-04-13 09:48:17',
            ),
        ));
        
        
    }
}