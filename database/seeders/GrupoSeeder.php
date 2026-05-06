<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 24; $i++) {
            $g = Grupo::create([
                'nombre' => "Grupo $i",
                'archivar' => false,
                'asignatura_id' => $i % 12 + 1,
                'user_id' => $i % 3 + 2,
            ]);
            $userIds = [];
            for ($u = 0; $u < 10; $u++) {
                $userIds[] = mt_rand(5,180);
            }
            $g->users()->attach($userIds);
        }
    }
}
