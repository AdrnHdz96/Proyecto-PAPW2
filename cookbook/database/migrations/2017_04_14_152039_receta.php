<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Receta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta', function (Blueprint $table) {
            $table->increments('idReceta');
            $table->integer('idGenero')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->string('nombre',150);
            $table->string('urlFoto');
            $table->timestamps();

            $table->foreign('idGenero')->references('idGenero')->on('genero');
            $table->foreign('idUsuario')->references('idUsuario')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receta');
    }
}
