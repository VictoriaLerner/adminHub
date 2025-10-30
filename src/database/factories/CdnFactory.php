<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cdn>
 */
class CdnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
	    return [
		    'name' => $this->faker->company,
		    'login' => $this->faker->userName,
		    'password' => 'password',
	    ];
    }
}
