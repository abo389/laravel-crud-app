<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "firstName" => fake()->name(),
            "lastName" => fake()->name(),
            "phone" => fake()->numerify('01#########'),
            "email" => fake()->unique()->safeEmail(),
            "bank" => fake()->numerify('##########'),
            "about" => fake()->paragraph()
        ];
    }
}
