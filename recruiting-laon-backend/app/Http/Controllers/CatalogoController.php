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
        return $request->all();
        dd($request->all());
        Catalogo::create([
            'titulo'=> 'Vingadores',
            'titulo_original'=>'avengers',
            'lancamento'=> '2019-09-02'
        ]);
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
