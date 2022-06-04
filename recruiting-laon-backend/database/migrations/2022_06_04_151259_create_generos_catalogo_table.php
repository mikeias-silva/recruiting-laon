<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerosCatalogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generos_catalogo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catalogo_id');
            $table->unsignedBigInteger('genero_id');
            $table->timestamps();
            $table->foreign('catalogo_id')->references('id')->on('catalogo');
            $table->foreign('genero_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generos_catalogo');
    }
}
