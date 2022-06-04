<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $table = 'generos';
    protected $fillable = ['genero'];


    public function generosCatalogo()
    {
        return $this->belongsToMany(Genero::class, 'generos_catalogo',  'genero_id','catalogo_id');

    }
}
