<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        $filmes = new Catalogo();
        $filmes = $filmes->getFilmes();

        return response()->json($filmes, 200);
    }

    public function store(Request $request)
    {
        $dataCatalogo = $request->all();
        $newCatalogo = new Catalogo();

        $response = $newCatalogo->saveCatalogo($dataCatalogo);
        return $this->responseAction($response);
    }

    public function show(Catalogo $catalogo)
    {
        $catalogo = $catalogo->showDetails($catalogo);

        return response()->json($catalogo, 200);
    }

    public function update(Request $request, Catalogo $catalogo)
    {
        $editCatalogo = new Catalogo();
        $response = $editCatalogo->editCatalogo($catalogo, $request);

        return $this->responseAction($response);
    }

    public function destroy(Catalogo $catalogo)
    {
        $response = $catalogo->deleteCatalogo($catalogo);
        return $this->responseAction($response);
    }

    public function responseAction($response)
    {
        if ($response['success']) {
            return response()->json([
                'message' => $response['success'],
            ], 200);
        }

        if ($response['error']) {
            return response()->json([
                'error' => $response['error'],
            ], 400);
        }
    }
}

;
