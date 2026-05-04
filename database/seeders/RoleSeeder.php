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
        $role_admin = Role::create(['name' => 'Admin']);
        $role_maestro = Role::create(['name' => 'Maestro']);
        $role_alumno = Role::create(['name' => 'Alumno']);

        #TODO: Los permisos de la aplicación
        $uer = Permission::create(['name' => 'user.edit.roles']);

        $role_admin->givePermissionTo($uer);
    }
}
