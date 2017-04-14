<?php

use Illuminate\Database\Seeder;

class seederGenero extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genero')->insert([
        ['nombre' => 'postre',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'bebida',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'comida rapida',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'frita',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'pasteles',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'carne',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'vegano',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'frio',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'caldos',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'tacos',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'hamburguesa',
        'created_at' => Carbon\Carbon::now()],
        ['nombre' => 'pizza',
        'created_at' => Carbon\Carbon::now()]
        ]);
    }
}
