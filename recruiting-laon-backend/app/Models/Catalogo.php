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
                'success' => "criado com sucesso"
            ];
            return $message;
        } catch (\Exception $exception) {
            $message = [
                'error' => $exception->getMessage()
            ];
            return $message;
        }

    }

    public function editCatalogo(Catalogo $catalogo, object $dataEditCatalogo)
    {
        try {
            $catalogo->titulo = $dataEditCatalogo->titulo;
            $catalogo->titulo_original = $dataEditCatalogo->titulo_original;
//            $catalogo->image = $dataEditCatalogo->image;
            $catalogo->save();
            $message = [
                'success' => "Alterado com sucesso"
            ];
            return $message;
        }catch (\Exception $exception){

            $message = [
                'error' => $exception->getMessage()
            ];
            return $message;
        }
    }

    public function deleteCatalogo(Catalogo $catalogo)
    {
        try {
            $catalogo->generos()->detach();
            Catalogo::destroy($catalogo->id);
            $message = [
                'success' => "Excluido com sucesso"
            ];
            return $message;
        }catch (\Exception $exception){
            $message = [
                'error' => $exception->getMessage()
            ];
            return $message;
        }

    }

    public function showDetails(Catalogo $catalogo)
    {
        return Catalogo::find($catalogo->id);
    }

    public function getFilmes()
    {
        return Catalogo::where('categoria_id', 1)->get();
    }

    public function getSeries()
    {
        return Catalogo::where('categoria_id', 2)->get();

    }



    public function generos()
    {
        return $this->belongsToMany(Catalogo::class, 'generos_catalogo',  'catalogo_id','genero_id');

    }

}
