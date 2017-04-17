<?php

use Illuminate\Database\Seeder;

class seederUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'nombre' => '@usuario',
            'email' => 'usuario@hotmail.com',
            'contrasena' => '12',
            'fechaNacimiento' => '1996-07-16',
            'genero' => 0,
            'urlFoto' => 'N/A',
            'created_at' => Carbon\Carbon::now()
        ]);
    }
}
