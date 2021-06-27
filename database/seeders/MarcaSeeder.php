<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert([
            [
                'name'      =>  'Honda',
                'tipo_id'   =>  1
            ],
            [
                'name'      =>  'BMW',
                'tipo_id'   =>  1
            ],
            [
                'name'      =>  'Suzuki',
                'tipo_id'   =>  1
            ],
            [
                'name'      =>  'Yamaha',
                'tipo_id'   =>  1
            ],
            [
                'name'      =>  'Toyota',
                'tipo_id'   =>  2
            ],
            [
                'name'      =>  'Volkswagen',
                'tipo_id'   =>  2
            ],
            [
                'name'      =>  'Ford',
                'tipo_id'   =>  2
            ],
            [
                'name'      =>  'Chevrolet',
                'tipo_id'   =>  2
            ],
            [
                'name'      =>  'Mercedes',
                'tipo_id'   =>  3
            ],
            [
                'name'      =>  'Volvo',
                'tipo_id'   =>  3
            ],
        ]);
    }
}
