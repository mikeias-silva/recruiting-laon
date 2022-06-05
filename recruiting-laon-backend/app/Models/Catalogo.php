<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $table = 'catalogo';
    protected $fillable = ['titulo', 'titulo_original', 'lancamento', 'minutos', 'sinopse', 'elenco', 'premios',
        'direcao', 'avaliacoes', 'image', 'categoria_id'];

    public function saveCatalogo(array $dataCatalogo)
    {
        try {

            $dataCatalogo['categoria_id'] = $dataCatalogo['categoria']['id'];
            $newCatalogo = Catalogo::create($dataCatalogo);

            foreach ($dataCatalogo['generos'] as $genero) {
                $newGenero = Genero::find($genero['id']);
                $newGenero->generosCatalogo()->attach($newCatalogo['id']);
            }
            $message = [
                'message' => "criado com sucesso",
                'status' => 201
            ];
            return $message;
        } catch (\Exception $exception) {
            $message = [
                'message' => $exception->getMessage(),
                'status' => 400
            ];
            return $message;
        }

    }
}
