<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Seguidor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidor', function (Blueprint $table) {
            $table->increments('idSeguidor');
            $table->integer('idUsuarioSeguidor')->unsigned();
            $table->integer('idUsuarioSigue')->unsigned();


            $table->foreign('idUsuarioSeguidor')->references('idUsuario')->on('usuario');
            $table->foreign('idUsuarioSigue')->references('idUsuario')->on('usuario');
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
        Schema::dropIfExists('seguidor');
    }
}
