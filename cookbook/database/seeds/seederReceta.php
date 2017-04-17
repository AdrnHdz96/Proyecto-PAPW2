<?php

use Illuminate\Database\Seeder;

class seederReceta extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receta')->insert([
            'idUsuario' => 1,
            'nombre' => 'Cereal',
            'urlFoto' => 'N/A',
            'created_at' => Carbon\Carbon::now()
        ]);


        DB::table('receta_genero')->insert([
            'idGenero' => 1,
            'idReceta' => 1,
            'created_at' => Carbon\Carbon::now()
        ]);
    }
}
