<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seederUsuario::class);
        $this->call(seederGenero::class);
        $this->call(seederReceta::class);
        $this->call(seederIngredientes::class);
        $this->call(seederPasos::class);
    }
}
