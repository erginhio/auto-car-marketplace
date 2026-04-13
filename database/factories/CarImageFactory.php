<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarImage>
 */
class CarImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_path'=>fake()->randomElement(['images/car1.jpg', 'images/car2.jpg', 'images/car3.jpg', 'images/car4.jpg', 'images/car5.avif', 'images/car6.webp']),
            'position'=>function (array $attributes) {
                return Car::find($attributes['car_id'])->images()->count()+1;
            }
        ];
    }
}
