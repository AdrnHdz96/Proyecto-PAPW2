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
            'idGenero' => 1,
            'idUsuario' => 1,
            'nombre' => 'Cereal',
            'urlFoto' => 'N/A',
            'created_at' => Carbon\Carbon::now()
        ]);
    }
}
