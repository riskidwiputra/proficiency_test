<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'   => $this->faker->text(),
            'key'    => 'client-'.uniqid(),
        ];
    }
}
