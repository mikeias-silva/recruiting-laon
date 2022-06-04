<?php

use App\Models\Catalogo;
use App\Models\Genero;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filmes', function () {

//    dd($filmes);
    $json = Storage::disk('local')->get('/public/filmes.json');
    $filmes = json_decode($json, true);
    try {

        foreach ($filmes['catalogo'] as $item) {

            $item['categoria_id'] = $item['categoria']['id'];
            $newCatalogo = Catalogo::create($item);
            dd($newCatalogo);
            foreach ($item['generos'] as $genero) {
                $newGenero = Genero::find($genero['id']);
                $newGenero->generosCatalogo()->attach($newCatalogo->id);
            }
        }
    } catch (\Exception $exception) {
        dd($exception);
    }
    dd("finalizado");
});


