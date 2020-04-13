<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
            ),
            2 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
            ),
            3 => 
            array (
                'permission_id' => 4,
                'role_id' => 1,
            ),
            4 => 
            array (
                'permission_id' => 5,
                'role_id' => 1,
            ),
            5 => 
            array (
                'permission_id' => 6,
                'role_id' => 1,
            ),
            6 => 
            array (
                'permission_id' => 7,
                'role_id' => 1,
            ),
            7 => 
            array (
                'permission_id' => 8,
                'role_id' => 1,
            ),
            8 => 
            array (
                'permission_id' => 9,
                'role_id' => 1,
            ),
            9 => 
            array (
                'permission_id' => 9,
                'role_id' => 2,
            ),
            10 => 
            array (
                'permission_id' => 10,
                'role_id' => 1,
            ),
            11 => 
            array (
                'permission_id' => 10,
                'role_id' => 2,
            ),
            12 => 
            array (
                'permission_id' => 11,
                'role_id' => 1,
            ),
            13 => 
            array (
                'permission_id' => 11,
                'role_id' => 2,
            ),
            14 => 
            array (
                'permission_id' => 12,
                'role_id' => 1,
            ),
            15 => 
            array (
                'permission_id' => 12,
                'role_id' => 2,
            ),
            16 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
            ),
            17 => 
            array (
                'permission_id' => 13,
                'role_id' => 3,
            ),
            18 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
            ),
            19 => 
            array (
                'permission_id' => 14,
                'role_id' => 3,
            ),
            20 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
            ),
            21 => 
            array (
                'permission_id' => 15,
                'role_id' => 3,
            ),
            22 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
            ),
            23 => 
            array (
                'permission_id' => 16,
                'role_id' => 3,
            ),
            24 => 
            array (
                'permission_id' => 17,
                'role_id' => 1,
            ),
            25 => 
            array (
                'permission_id' => 17,
                'role_id' => 4,
            ),
            26 => 
            array (
                'permission_id' => 18,
                'role_id' => 1,
            ),
            27 => 
            array (
                'permission_id' => 18,
                'role_id' => 4,
            ),
            28 => 
            array (
                'permission_id' => 19,
                'role_id' => 1,
            ),
            29 => 
            array (
                'permission_id' => 19,
                'role_id' => 4,
            ),
            30 => 
            array (
                'permission_id' => 20,
                'role_id' => 1,
            ),
            31 => 
            array (
                'permission_id' => 20,
                'role_id' => 4,
            ),
        ));
        
        
    }
}