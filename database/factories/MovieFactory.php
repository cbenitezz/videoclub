<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'genre_id'     => rand(1,6),
            'type_id'      => rand(1,3),
            'name'         => $this->faker->name,
            'synopsis'     => $this->faker->text(200),
            'price'        => $this->faker->randomFloat(2, 0, 10000),
            'date_release' => $this->faker->date(),
        ];
    }
}
