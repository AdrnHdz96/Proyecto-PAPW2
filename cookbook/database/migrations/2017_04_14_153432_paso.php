<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paso', function (Blueprint $table) {
            $table->increments('idPaso');
            $table->integer('idReceta')->unsigned();
            $table->string('titulo',50)->nullable();
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('idReceta')->references('idReceta')->on('receta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paso');
    }
}
