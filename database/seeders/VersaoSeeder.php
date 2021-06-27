<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VersaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('versaos')->insert([
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  1
            ],
            [
                'name'      =>  'v-000000200',
                'modelo_id'   =>  1
            ],
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  3
            ],
            [
                'name'      =>  'v-000000200',
                'modelo_id'   =>  3
            ],
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  4
            ],
            [
                'name'      =>  'v-000000200',
                'modelo_id'   =>  4
            ],
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  5
            ],
            [
                'name'      =>  'v-000000200',
                'modelo_id'   =>  5
            ],
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  6
            ],
            [
                'name'      =>  'v-000000200',
                'modelo_id'   =>  6
            ],
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  7
            ],
            [
                'name'      =>  'v-000000200',
                'modelo_id'   =>  7
            ],
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  8
            ],
            [
                'name'      =>  'v-000000200',
                'modelo_id'   =>  8
            ],
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  9
            ],
            [
                'name'      => 'v-000000200',
                'modelo_id'   =>  9
            ],
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  10
            ],
            [
                'name'      =>  'v-000000200',
                'modelo_id'   =>  10
            ],
            [
                'name'      =>  'v-000000100',
                'modelo_id'   =>  11
            ],
            [
                'name'      =>  'v-000000200',
                'modelo_id'   =>  11
            ],
        ]);
    }
}
