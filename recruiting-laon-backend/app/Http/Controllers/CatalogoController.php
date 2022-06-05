<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        //
        $catalogo = Catalogo::all();
        return $catalogo;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $dataCatalogo = $request->all();
        $newCatalogo = new Catalogo();

        $response = $newCatalogo->saveCatalogo($dataCatalogo);

        if ($response['status'] == 201) {
            return response()->json([
                'message' => $response['message'],
            ], $response['status']);
        }

        if ($response['status'] == 400) {
            return response()->json([
                'error' => $response['message'],
            ], $response['status']);
        }
    }

    public function show(Catalogo $catalogo)
    {
        //
    }


    public function edit(Catalogo $catalogo)
    {
        //
    }

    public function update(Request $request, Catalogo $catalogo)
    {
        //
    }

    public function destroy(Catalogo $catalogo)
    {
        //
    }
}
