<?php

namespace Database\Factories;

use App\Models\Maker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->randomElement([
                "Camry", "Lexus", "Corolla", "Crown", "4Runner", "Highlander", "RAV4", "Sienna", "Supra", "Tacoma", "Tundra", "Prius", "Avalon", "Mirai", "86", "Land Cruiser", "Yaris", "C-HR", "Corolla Hatchback", "Mirai Fuel Cell", "GR Supra", "Venza"
            ]),
            "maker_id"=>Maker::inRandomOrder()->first()->id,
        ];
    }
}
