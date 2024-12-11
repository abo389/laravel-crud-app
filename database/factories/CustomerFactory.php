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
            "firstName" => fake()->word(),
            "lastName" => fake()->word(),
            "phone" => fake()->numerify('+1 (###) ###-####'),
            "email" => fake()->unique()->safeEmail(),
            "bank" => fake()->numerify('##########'),
            "about" => fake()->paragraph()
        ];
    }
}
