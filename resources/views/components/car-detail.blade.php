@props(['car' => []])
@php
$carDetails = [
    'Maker' => $car->maker->name,
    'Model' => $car->model->name,
    'Year' => $car->year,
    'Price' => '$' . $car->price,
    'Mileage' => $car->mileage . ' miles',
    'Fuel Type' => $car->fuelType->name,
];
@endphp
{{-- car details --}}
<div class="flex flex-col space-y-2 py-4 ">
@foreach ($carDetails as $key => $detail)
    <div class="flex items-center text-xl justify-between">
        <div class="text-gray-600 w-full">{{ $key }}:</div>
        <div class="w-full">{{ $detail }}</div>
    </div>
@endforeach
</div>