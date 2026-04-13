<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maker>
 */
class MakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Mercedes-Benz',
                'BMW',
                'Toyota',
                'Ford',
                'Honda',
                'Nissan',
                'Volkswagen',
                'Chevrolet',
                'Tesla',
                'Kia',
                'Hyundai',
                'Mazda',
                'Subaru',
                'Audi',
                'Volvo',
                'Land Rover',
                'Jaguar',
                'Mitsubishi',
                'Peugeot',
                'Renault',
                'Citroen',
                'Fiat',
                'Skoda',
                'Seat',
                'Suzuki',
                'Dacia',
            ])
        ];
    }
}
