<?php

use Illuminate\Database\Seeder;

class seederPasos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('paso')->insert([[
            'idReceta' => 1,
            'titulo' => 'Primer Paso',
            'descripcion' => 'Vertir la leche en un tazón',
            'created_at' => Carbon\Carbon::now()
        ],[
            'idReceta' => 1,
            'titulo' => 'Segundo Paso',
            'descripcion' => 'Vertir el cereal en el tazón',
            'created_at' => Carbon\Carbon::now()
        ],[
            'idReceta' => 1,
            'titulo' => 'Ultimo Paso',
            'descripcion' => 'Saborear el cereal',
            'created_at' => Carbon\Carbon::now()
        ]]
        );
    }
}
