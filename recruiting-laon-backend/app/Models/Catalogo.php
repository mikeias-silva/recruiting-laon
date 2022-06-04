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
}
