<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use App\Models\Model;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('published_at', '<', now())
            ->with('primaryImage','model', 'city', 'maker', 'carType', 'fuelType')
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        $makers = Maker::all();
        $models = Model::all();

        return view('home.index', [
            'cars' => $cars,
            'makers' => $makers,
            'models' => $models
        ]);
    }
}
