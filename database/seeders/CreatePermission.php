<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;


class CreatePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view']);

        $role1 = Role::create(['name' => 'guest']);
        $role1->givePermissionTo('view');

        // $role = Role::create(['guard_name' => 'admin', 'name' => 'manager']);
        // $permission = Permission::create(['guard_name' => 'admin', 'name' => 'edit articles']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $role->syncPermissions($permissions);
        // $permission->syncRoles($roles);


    }
}
