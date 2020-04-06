<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Role-list',
            'Role-create',
            'Role-edit',
            'Role-delete',
            'User-list',
            'User-create',
            'User-edit',
            'User-delete'
         ];


         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
     }
}
