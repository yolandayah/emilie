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
            for ($i = 1; $i <= 3; $i++) {
                $user = User::create([
                    'username' => 'maestro0'."$i",
                    'email' => 'maestro0'."$i".'@zapopan.tecmm.edu.mx',
                    'name' => 'maestro0'."$i",
                    'last_name' => 'de zapopan'."$i",
                    'password' => 'maestro',
                ]);
                $user->assignRole('Maestro');;
            }

            User::factory()
                ->count(180)
                ->create();

            $this->call(AsignaturaSeeder::class);
            $this->call(GrupoSeeder::class);
        }
    }
}
