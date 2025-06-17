<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['nombre' => 'Accion', 'imagen' => 'path/to/accion.png']);
        Categoria::create(['nombre' => 'Fantasia', 'imagen' => 'path/to/fantasia.png']);
        Categoria::create(['nombre' => 'Romance', 'imagen' => 'path/to/romance.png']);
    }
}
