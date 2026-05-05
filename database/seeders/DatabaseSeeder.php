<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

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
            'name' => 'usuario',
            'last_name' => 'administrador',
            'password' => 'administrador',
            'force_password_change' => true
        ]);

        $user->assignRole('Admin');;

        if (App::environment('local')) {
            // Solo en ambiente de desarrollo creamos los ejemplos
            User::factory()
                ->count(180)
                ->create();
        }
    }
}
