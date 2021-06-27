<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modelos')->insert([
            [
                'name'      =>  'Honda CB 300R',
                'marca_id'   =>  1
            ],
            [
                'name'      =>  'Honda CBR 500R',
                'marca_id'   =>  1
            ],
            [
                'name'      =>  'BMW F 750 GS',
                'marca_id'   =>  2
            ],
            [
                'name'      =>  'BMW S 1000 RR',
                'marca_id'   =>  2
            ],
            [
                'name'      =>  'Suzuki Burgman 650',
                'marca_id'   =>  3
            ],
            [
                'name'      =>  'Suzuki GSX-R1000',
                'marca_id'   =>  3
            ],
            [
                'name'      =>  'Yamaha Crosser 150',
                'marca_id'   =>  4
            ],
            [
                'name'      =>  'Yamaha MT-09',
                'marca_id'   =>  4
            ],
            [
                'name'      =>  'Corolla',
                'marca_id'   =>  5
            ],
            [
                'name'      =>  'Hilux',
                'marca_id'   =>  5
            ],
            [
                'name'      =>  'Gol',
                'marca_id'   =>  6
            ],
            [
                'name'      =>  'T-Cross',
                'marca_id'   =>  6
            ],
            [
                'name'      =>  'Bronco Sport',
                'marca_id'   =>  7
            ],
            [
                'name'      =>  'Ranger',
                'marca_id'   =>  7
            ],
            [
                'name'      =>  'Onix',
                'marca_id'   =>  8
            ],
            [
                'name'      =>  'Camaro',
                'marca_id'   =>  8
            ],
            [
                'name'      =>  'Mercedes-Benz Accelo',
                'marca_id'   =>  9
            ],
            [
                'name'      =>  'Mercedes-Benz Actros',
                'marca_id'   =>  9
            ],
            [
                'name'      =>  'Volvo FM',
                'marca_id'   =>  10
            ],
            [
                'name'      =>  'Volvo VM',
                'marca_id'   =>  10
            ],
        ]);
    }
}
