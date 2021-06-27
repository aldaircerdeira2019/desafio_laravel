<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dica;

class DicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dica::factory()->count(500)->create();
    }
}
