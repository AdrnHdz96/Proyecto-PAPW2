<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecetaGenero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta_genero', function (Blueprint $table) {
            $table->integer('idReceta')->unsigned();
            $table->integer('idGenero')->unsigned();
            $table->timestamps();

            $table->primary(array('idReceta','idGenero'));

            $table->foreign('idReceta')->references('idReceta')->on('receta');
            $table->foreign('idGenero')->references('idGenero')->on('genero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receta_genero');
    }
}
