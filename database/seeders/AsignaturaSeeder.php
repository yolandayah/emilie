<?php

namespace Database\Seeders;

use App\Models\Asignatura;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class AsignaturaSeeder extends Seeder
{
    public function run(): void
    {
        Asignatura::create(['nombre' => 'Álgebra Lineal']);

        if (App::environment('local')) {
            Asignatura::create(['nombre' => 'Cálculo Diferencial']);
            Asignatura::create(['nombre' => 'Contabilidad Financiera']);
            Asignatura::create(['nombre' => 'Taller de Administración']);
            Asignatura::create(['nombre' => 'Cálculo Integral']);
            Asignatura::create(['nombre' => 'Taller de Ética']);
            Asignatura::create(['nombre' => 'Matemáticas Discretas']);
            Asignatura::create(['nombre' => 'Probabilidad y Estadística']);
            Asignatura::create(['nombre' => 'Fundamentos de Programación']);
            Asignatura::create(['nombre' => 'Programación Orientada a Objetos']);
            Asignatura::create(['nombre' => 'Fundamentos de Investigación']);
            Asignatura::create(['nombre' => 'Química']);
        }
    }
}
