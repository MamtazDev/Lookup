<?php

namespace Database\Seeders;

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
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',  
            'product-category-list',
            'product-category-create',
            'product-category-edit',
            'product-category-delete',           
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}