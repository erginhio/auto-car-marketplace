<?php

namespace App\Http\Controllers;

use App\Mail\CarPosted;
use App\Models\Car;
use App\Models\Maker;
use App\Models\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = User::find(id: Auth::id())
            ->cars()
            ->with(['primaryImage', 'maker', 'model'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $makers = Maker::all();
        $models = Model::all();

        return view('car.create', compact('makers', 'models'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ Validate
        $carAtrributes = $request->validate([
            'maker_id' => ['required'],
            'model_id' => ['required'],
            'year' => ['required'],
            'car_type_id' => ['required'],
            'price' => ['required'],
            'mileage' => ['required'],
            'fuel_type_id' => ['required'],
            'phone' => ['required'],
            'images.*' => ['image']
        ]);

        // ✅ Create Car
        $car = Auth::user()->cars()->create([
            ...$carAtrributes,
            'description' => $request->description,
            'published_at' => now()
        ]);

        // ✅ 🚗 HANDLE FEATURES (IMPORTANT PART)
        $allFeatures = [
            'air_conditioning',
            'power_windows',
            'power_door_locks',
            'abs',
            'cruise_control',
            'bluetooth_connectivity',
            'remote_start',
            'gps_navigation',
            'heater_seat',
            'climate_control',
            'rear_parking_sensors',
            'leather_seats',
        ];

        $featuresData = [];

        foreach ($allFeatures as $feature) {
            // true if checked, false if not
            $featuresData[$feature] = isset($request->features[$feature]);
        }

        // attach car_id
        $featuresData['car_id'] = $car->id;

        // save
        $car->features()->create($featuresData);

        // ✅ Handle Images safely
        if ($request->hasFile('images')) {
            $storedPaths = [];

            foreach ($request->file('images') as $index => $file) {
                $storedPaths[] = [
                    'image_path' => $file->store('images', 'public'),
                    'position' => $index + 1
                ];
            }

            $car->images()->createMany($storedPaths);
        }

        // ✅ Send email
        Mail::to($car->owner->email)->queue(new CarPosted($car));

        return redirect(route('car.index'));
    }

    /**
     * Display the specified resource.
    */
    public function show(Car $car)
    {
        return view('car.show', [
            'car' => $car,
            'favorite' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        // ✅ VALIDATE (recommended)
        $request->validate([
            'maker_id' => ['required'],
            'model_id' => ['required'],
            'year' => ['required'],
            'car_type_id' => ['required'],
            'price' => ['required'],
            'mileage' => ['required'],
            'fuel_type_id' => ['required'],
            'phone' => ['required'],
            'images.*' => ['image']
        ]);

        // ✅ UPDATE CAR
        $car->update($request->only([
            'maker_id',
            'model_id',
            'year',
            'car_type_id',
            'price',
            'mileage',
            'fuel_type_id',
            'phone',
            'description'
        ]));

        // ✅ 🚗 HANDLE FEATURES
        $allFeatures = [
            'air_conditioning',
            'power_windows',
            'power_door_locks',
            'abs',
            'cruise_control',
            'bluetooth_connectivity',
            'remote_start',
            'gps_navigation',
            'heater_seat',
            'climate_control',
            'rear_parking_sensors',
            'leather_seats',
        ];

        $featuresData = [];

        foreach ($allFeatures as $feature) {
            $featuresData[$feature] = isset($request->features[$feature]);
        }

        // update or create features
        $car->features()->updateOrCreate(
            ['car_id' => $car->id],
            $featuresData
        );

        // 🔥 DELETE IMAGES
        if (!empty($request->deleted_images)) {

            $ids = array_filter(explode(',', $request->deleted_images));

            foreach ($ids as $id) {
                $image = $car->images()->where('id', $id)->first();

                if ($image) {
                    Storage::disk('public')->delete($image->image_path);
                    $image->delete();
                }
            }
        }

        // 🔥 ADD NEW IMAGES
        if ($request->hasFile('images')) {

            $last = $car->images()->max('position') ?? 0;

            foreach ($request->file('images') as $i => $img) {
                $car->images()->create([
                    'image_path' => $img->store('images', 'public'),
                    'position' => $last + $i + 1
                ]);
            }
        }

        return redirect()->route('car.index')
            ->with('success', 'Car updated successfully 🚗');
    }

    public function search(Request $request)
    {
        $orderBy = [
            (object) [
                "id" => "price",
                "name" => "Price"
            ],
            (object) [
                "id" => "year",
                "name" => "year"
            ]
        ];
        $query = Car::where('published_at', '<', now());
        $query->with('primaryImage', 'model', 'maker', 'carType', 'fuelType');

        // maker
        $query->when(request('maker_id'), function ($query) {
                $query->where('maker_id', request('maker_id'));
            });

        // model
        $query->when(request('model_id'), function ($query) {
                $query->where('model_id', request('model_id'));
            });

        // car type
        $query->when(request('car_type_id'), function ($query) {
                $query->where('car_type_id', request('car_type_id'));
            });

        // fuel type
        $query->when(request('fuel_type_id'), function ($query) {
                $query->where('fuel_type_id', request('fuel_type_id'));
            });

//        // state
//        $query->when(request('state_id'), function ($query) {
//                $query->where('state_id', request('state_id'));
//            });
//
//        // city
//        $query->when(request('city_id'), function ($query) {
//                $query->where('city_id', request('city_id'));
//            });
//

        $query->when(request('yearFrom') && request('yearTo'), function ($query) {
            $query->whereBetween('year', [request('yearFrom'), request('yearTo')]);
        });

        // price
        $query->when(request('priceFrom') && request('priceTo'), function ($query) {
            $query->whereBetween('price', [request('priceFrom'), request('priceTo')]);
        });

        $query->when(request('orderBy'), function ($query) {
            $query->orderBy(request('orderBy'), 'desc');
        }, function ($query) {
            $query->orderBy('published_at', 'desc');
        });

        // search by input
        $query->when(request('search'), function ($query) {
            $search = request('search');
            $query->where('description', 'like', "%{$search}%")
//            ->orWhere('vin', 'like', "%{$search}%")
            ->orWhere('mileage', 'like', "%{$search}%");
//            ->orWhere('address', 'like', "%{$search}%");
            $query->orWhere(function ($query) use ($search) {
                $query->whereHas('model', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('maker', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('carType', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('fuelType', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
//                ->orWhereHas('city', function ($query) use ($search) {
//                    $query->where('name', 'like', "%{$search}%");
//                });
            });
        });


        $cars = $query->paginate(12);

        $makers = Maker::all();
        $models = Model::all();
        return view('car.search', compact('cars', 'orderBy', 'makers', 'models'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('car.index')->with('success', 'Car deleted successfully.');
    }
    public function watchlist()
    {
        $cars = Auth::user()
            ->favouriteCars()
            ->with('primaryImage', 'model', 'maker', 'carType', 'fuelType')
            ->where('deleted_at', null)
            ->orderBy('published_at', 'desc')
            ->paginate(10);
        return view('car.watchlist', compact('cars'));
    }
}
