<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $user = User::factory()->create([
            'username' => 'admin',
            'email' => 'usuario@administrador.com',
            'name' => 'Usuario Administrador',
            'password' => 'administrador',
            'force_password_change' => true
        ]);

        $user->assignRole('Admin');;

        User::factory()->count(30)->create();
    }
}
