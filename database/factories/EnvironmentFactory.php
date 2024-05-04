<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Environment>
 */
class EnvironmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $envs = ['production', 'staging', 'testing', 'development'];

        return [
            'name' => $this->faker->randomElement($envs),
            'description' => $this->faker->sentence(),
        ];
    }
}
