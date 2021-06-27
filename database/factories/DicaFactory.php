<?php

namespace Database\Factories;

use App\Models\Dica;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Modelo;
use App\Models\User;

class DicaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dica::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $modelo_id = Modelo::pluck('id')->toArray();
        $user_id = User::pluck('id')->toArray();

        return [
            'title'         => $this->faker->paragraph(1),
            'descri'        => $this->faker->text(),
            'modelo_id'     => $this->faker->randomElement($modelo_id), 
            'user_id'       => $this->faker->randomElement($user_id), 
        ];
    }
}
