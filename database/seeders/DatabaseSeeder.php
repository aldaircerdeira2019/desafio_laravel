<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(ModeloSeeder::class);
        $this->call(VersaoSeeder::class);
        $this->call(DicaSeeder::class);
    }
}
