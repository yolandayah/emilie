<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role_admin   = Role::create(['name' => 'Admin']);
        $role_maestro = Role::create(['name' => 'Maestro']);

        #TODO: Los permisos de la aplicación
        $uer = Permission::create(['name' => 'user.edit.roles']);
        $ul  = Permission::create(['name' => 'user.index']);

        $role_admin->givePermissionTo([$ul,$uer]);
        $role_maestro->givePermissionTo($ul);
    }
}
