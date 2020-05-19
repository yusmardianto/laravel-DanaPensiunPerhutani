<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateAdminUserSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(MasterStatusesTableSeeder::class);
        $this->call(MasterBanksTableSeeder::class);
        $this->call(MasterVouchersTableSeeder::class);
        $this->call(MasterGolongansTableSeeder::class);
        $this->call(MasterPeriodesTableSeeder::class);
        $this->call(MasterPejabatKerjasTableSeeder::class);
        $this->call(MasterUnitKerjasTableSeeder::class);
        $this->call(MasterGroupPembayaransTableSeeder::class);
        $this->call(MasterUnitPembayaransTableSeeder::class);
        $this->call(RegenciesTableSeeder::class);
    }
}
