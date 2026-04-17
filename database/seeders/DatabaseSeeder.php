<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\State;
use App\Models\User;
use App\Models\Model;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create 10 car types 
        CarType::factory()->sequence(
            ['name' => 'Sedan'],
            ['name' => 'Hatchback'],
            ['name' => 'SUV'],
            ['name' => 'Coupe'],
            ['name' => 'Convertible'],
            ['name' => 'Wagon'],
            ['name' => 'Van'],
            ['name' => 'Truck'],
            ['name' => 'Hybrid'],
            ['name' => 'Electric']
        )->count(10)->create();
        // create fuel type
        FuelType::factory()->sequence(
            ['name' => 'Gasoline'],
            ['name' => 'Diesel'],
            ['name' => 'Hybrid'],
            ['name' => 'Electric']
        )->count(4)->create();

        $states = [
            'california' => ['los angeles', 'san francisco', 'san diego', 'sacramento', 'fresno', 'long beach', 'oakland', 'santa ana', 'anaheim'],
            'texas' => ['houston', 'san antonio', 'dallas', 'austin', 'fort worth', 'el paso', 'arlington', 'corpus christi', 'plano'],
            'florida' => ['jacksonville', 'miami', 'tampa', 'orlando', 'st. petersburg', 'hialeah', 'fort lauderdale', 'tallahassee', 'port st. lucie'],
            'new york' => ['new york city', 'buffalo', 'rochester', 'yonkers', 'syracuse', 'albany', 'new rochelle', 'mount vernon', 'utica'],
            'illinois' => ['chicago', 'aurora', 'rockford', 'naperville', 'springfield', 'peoria', 'elgin', 'joliet', 'waukegan'],
            'ohio' => ['columbus', 'cleveland', 'cincinnati', 'toledo', 'akron', 'dayton', 'parma', 'youngstown', 'canton'],
            'georgia' => ['atlanta', 'augusta', 'columbus', 'savannah', 'macon', 'athens', 'sandy springs', 'rosedale', 'johns creek'],
            'pennsylvania' => ['philadelphia', 'pittsburgh', 'allentown', 'erie', 'reading', 'scranton', 'bethlehem', 'lancaster', 'harrisburg'],
            'north carolina' => ['charlotte', 'raleigh', 'greensboro', 'durham', 'winston-salem', 'fayetteville', 'cary', 'wilmington', 'high point'],
        ];
        // create states
        foreach ($states as $state => $cities) {
            State::factory()->state(['name' => $state])
                ->has(City::factory()->count(count($cities)))
                ->sequence(...array_map(fn($city) => ['name' => $city], $cities))
                ->create();
        }

        $makers = [
            'Toyota' => ['Camry', 'Corolla', 'RAV4', 'Highlander', 'Sienna', 'Tacoma', 'Tundra', 'Avalon', 'Prius', 'Yaris'],
            'Honda' => ['Accord', 'Civic', 'CR-V', 'Pilot', 'Odyssey', 'Passport', 'Ridgeline'],
            'Ford' => ['F-150', 'Mustang', 'Explorer', 'Escape', 'Focus', 'Fusion', 'Mustang', 'Ranger', 'Taurus'],
            'Nissan' => ['Altima', 'Armada', 'Frontier', 'Maxima', 'Pathfinder', 'Quest', 'Sentra', 'Titan', 'Versa', 'Xterra'],
            'Chevrolet' => ['Camaro', 'Corvette', 'Equinox', 'Impala', 'Malibu', 'Silverado', 'Spark', 'Tahoe', 'Traverse', 'Volt'],
            'BMW' => ['3 Series', '5 Series', '7 Series', 'M3', 'M5', 'M6', 'X3', 'X5', 'X6', 'Z4'],
            'Audi' => ['A3', 'A4', 'A5', 'A6', 'A7', 'Q3', 'Q5', 'Q7', 'RS3', 'RS5', 'RS6'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'G-Class', 'S-Class', 'GL-Class', 'GLA-Class', 'GLC-Class', 'GLE-Class', 'GLS-Class'],
        ];
        //create makers data 
        foreach ($makers as $maker => $models) {
            Maker::factory()->state(['name' => $maker])
                ->has(Model::factory()->count(count($models)))
                ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                ->create();
        }

        //create 3 users
        User::factory()->count(3)->create();
        // create 2 users and 50 cars 
        // and add to favourite cars of these 2 users
        User::factory()->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(CarImage::factory()
                        ->count(5)
                        ->sequence(fn(Sequence $sequence) =>
                            ['position' => $sequence->index % 5 + 1]), 'images')
                    ->hasFeatures(),
                'favouriteCars'
            )
            ->create();
    }
}