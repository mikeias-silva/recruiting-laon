<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('titulo_original');
            $table->date('lancamento');
            $table->integer('minutos');
            $table->text('sinopse');
            $table->string('elenco');
            $table->string('premios');
            $table->string('direcao');
            $table->string('avaliacoes');
            $table->longText('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogo');
    }
}
