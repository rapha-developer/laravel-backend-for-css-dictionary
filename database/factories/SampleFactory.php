<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sample>
 */
class SampleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_id' => Property::all()->random()->id,
            'title' => $this->faker->unique()->jobTitle(),
            'description' => $this->faker->unique()->text(),
            'description_pt' => $this->faker->unique()->text(),
        ];
    }
}
