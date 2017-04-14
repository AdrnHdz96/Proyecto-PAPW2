<?php

use Illuminate\Database\Seeder;

class seederIngredientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingrediente')->insert([[
            'idReceta' => 1,
            'nombre' => 'Cereal',
            'cantidad' => '1 caja',
            'created_at' => Carbon\Carbon::now()
        ],[
            'idReceta' => 1,
            'nombre' => 'Leche',
            'cantidad' => '1 taza',
            'created_at' => Carbon\Carbon::now()
        ]]

        );
    }
}
