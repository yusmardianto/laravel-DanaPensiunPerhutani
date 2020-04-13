<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@dapen.co.id',
                'email_verified_at' => NULL,
                'no_hp' => '081234567890',
                'is_active' => 1,
                'password' => '$2y$10$bc5w4FU9OzR9htCx7NHDXecaABK8uuHA8FV0XyktC5vxLg2ufp80S',
                'remember_token' => NULL,
                'created_at' => '2020-04-07 04:56:32',
                'updated_at' => '2020-04-07 05:40:22',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Kepesertaan',
                'username' => 'kepesertaan',
                'email' => 'kepesertaan@dapen.co.id',
                'email_verified_at' => NULL,
                'no_hp' => '089876543210',
                'is_active' => 1,
                'password' => '$2y$10$KaVRQYu4StHji/0IVlrJy.9zmfzyyRHh7okKq7KuLanL9F5VQT9ku',
                'remember_token' => NULL,
                'created_at' => '2020-04-07 05:39:54',
                'updated_at' => '2020-04-07 05:39:54',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Pengembangan dan Investasi',
                'username' => 'pengembangan',
                'email' => 'pengembanganinvestasi@dapen.co.id',
                'email_verified_at' => NULL,
                'no_hp' => '081213141516',
                'is_active' => 1,
                'password' => '$2y$10$G9oIyFNmo329Njva2JCpGejTF/L/ySLWLatT6Cbr47KSMRyoVbp1m',
                'remember_token' => NULL,
                'created_at' => '2020-04-07 11:26:11',
                'updated_at' => '2020-04-07 11:26:11',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Keuangan',
                'username' => 'keuangan',
                'email' => 'keuangan@dapen.co.id',
                'email_verified_at' => NULL,
                'no_hp' => '081287282782',
                'is_active' => 1,
                'password' => '$2y$10$tvMJIZ5XMGWgK1LK./322e6FmRpIaafMJNJO4mHILHszzF4nfWaae',
                'remember_token' => NULL,
                'created_at' => '2020-04-13 09:48:57',
                'updated_at' => '2020-04-13 09:48:57',
            ),
        ));


    }
}
