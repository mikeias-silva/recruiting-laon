<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = ['Filmes', 'Séries'];

        foreach ($categorias as $categoria) {

            Categoria::create([
                'categoria' => $categoria
            ]);
        }
    }
}
