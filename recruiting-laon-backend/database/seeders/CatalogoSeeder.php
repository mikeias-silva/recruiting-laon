<?php

namespace Database\Seeders;

use App\Models\Catalogo;
use App\Models\Genero;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/public/filmes.json');
        $filmes = json_decode($json, true);
        foreach ($filmes['catalogo'] as $item) {
            $item['categoria_id'] = $item['categoria']['id'];
            $newCatalogo = Catalogo::create([
                'titulo' => $item['titulo'],
                'titulo_original' => $item['titulo_original'],
                'lancamento' => $item['lancamento'],
                'minutos' => $item['minutos'],
                'sinopse' => $item['sinopse'],
                'elenco' => $item['elenco'],
                'premios' => $item['premios'],
                'direcao' => $item['direcao'],
                'avaliacoes' => $item['avaliacoes'],
                'image' => $item['image'],
                'categoria_id' => $item['categoria_id']
            ]);
            foreach ($item['generos'] as $genero) {
                $newGenero = Genero::find($genero['id']);
                $newGenero->generosCatalogo()->attach($newCatalogo['id']);
            }
        }
    }


}
