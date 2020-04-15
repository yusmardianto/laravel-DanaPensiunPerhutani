<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Role-list',
                'guard_name' => 'web',
                'module_id' => 1,
                'created_at' => '2020-04-07 04:56:31',
                'updated_at' => '2020-04-07 04:56:31',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Role-create',
                'guard_name' => 'web',
                'module_id' => 1,
                'created_at' => '2020-04-07 04:56:31',
                'updated_at' => '2020-04-07 04:56:31',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Role-edit',
                'guard_name' => 'web',
                'module_id' => 1,
                'created_at' => '2020-04-07 04:56:31',
                'updated_at' => '2020-04-07 04:56:31',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Role-delete',
                'guard_name' => 'web',
                'module_id' => 1,
                'created_at' => '2020-04-07 04:56:31',
                'updated_at' => '2020-04-07 04:56:31',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'User-list',
                'guard_name' => 'web',
                'module_id' => 2,
                'created_at' => '2020-04-07 04:56:31',
                'updated_at' => '2020-04-07 04:56:31',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'User-create',
                'guard_name' => 'web',
                'module_id' => 2,
                'created_at' => '2020-04-07 04:56:31',
                'updated_at' => '2020-04-07 04:56:31',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'User-edit',
                'guard_name' => 'web',
                'module_id' => 2,
                'created_at' => '2020-04-07 04:56:31',
                'updated_at' => '2020-04-07 04:56:31',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'User-delete',
                'guard_name' => 'web',
                'module_id' => 2,
                'created_at' => '2020-04-07 04:56:31',
                'updated_at' => '2020-04-07 04:56:31',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Master-list',
                'guard_name' => 'web',
                'module_id' => 3,
                'created_at' => '2020-04-07 04:56:32',
                'updated_at' => '2020-04-07 04:56:32',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Master-create',
                'guard_name' => 'web',
                'module_id' => 3,
                'created_at' => '2020-04-07 04:56:32',
                'updated_at' => '2020-04-07 04:56:32',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Master-edit',
                'guard_name' => 'web',
                'module_id' => 3,
                'created_at' => '2020-04-07 04:56:32',
                'updated_at' => '2020-04-07 04:56:32',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Master-delete',
                'guard_name' => 'web',
                'module_id' => 3,
                'created_at' => '2020-04-07 04:56:32',
                'updated_at' => '2020-04-07 04:56:32',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Kepesertaan-list',
                'guard_name' => 'web',
                'module_id' => 4,
                'created_at' => '2020-04-07 05:38:17',
                'updated_at' => '2020-04-07 05:38:17',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Kepesertaan-create',
                'guard_name' => 'web',
                'module_id' => 4,
                'created_at' => '2020-04-07 05:38:25',
                'updated_at' => '2020-04-07 05:38:25',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Kepesertaan-edit',
                'guard_name' => 'web',
                'module_id' => 4,
                'created_at' => '2020-04-07 05:38:31',
                'updated_at' => '2020-04-07 05:38:31',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Kepesertaan-delete',
                'guard_name' => 'web',
                'module_id' => 4,
                'created_at' => '2020-04-07 05:38:37',
                'updated_at' => '2020-04-07 05:38:37',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Pengembangan dan Investasi-list',
                'guard_name' => 'web',
                'module_id' => 5,
                'created_at' => '2020-04-07 11:24:30',
                'updated_at' => '2020-04-07 11:24:30',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Pengembangan dan Investasi-create',
                'guard_name' => 'web',
                'module_id' => 5,
                'created_at' => '2020-04-07 11:24:35',
                'updated_at' => '2020-04-07 11:24:35',
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'Pengembangan dan Investasi-edit',
                'guard_name' => 'web',
                'module_id' => 5,
                'created_at' => '2020-04-07 11:24:38',
                'updated_at' => '2020-04-07 11:24:38',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Pengembangan dan Investasi-delete',
                'guard_name' => 'web',
                'module_id' => 5,
                'created_at' => '2020-04-07 11:24:43',
                'updated_at' => '2020-04-07 11:24:43',
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'Keuangan-list',
                'guard_name' => 'web',
                'module_id' => 6,
                'created_at' => '2020-04-13 09:47:26',
                'updated_at' => '2020-04-13 09:47:26',
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'Keuangan-create',
                'guard_name' => 'web',
                'module_id' => 6,
                'created_at' => '2020-04-13 09:47:36',
                'updated_at' => '2020-04-13 09:47:36',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'Keuangan-edit',
                'guard_name' => 'web',
                'module_id' => 6,
                'created_at' => '2020-04-13 09:47:41',
                'updated_at' => '2020-04-13 09:47:41',
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'Keuangan-delete',
                'guard_name' => 'web',
                'module_id' => 6,
                'created_at' => '2020-04-13 09:47:47',
                'updated_at' => '2020-04-13 09:47:47',
            ),
        ));
    }
}
