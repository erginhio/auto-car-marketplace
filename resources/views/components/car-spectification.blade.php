@props(['carFeatures'=>[]])
@php
    $carSpecifications = [
        'Air Conditioning' => $carFeatures->air_conditioning,
        'Power Windows' => $carFeatures->power_windows,
        'Power Door Locks' => $carFeatures->power_door_locks,
        'ABS' => $carFeatures->abs,
        'Cruise Control' => $carFeatures->cruise_control,
        'Bluetooth Connectivity' => $carFeatures->bluetooth_connectivity,
        'Remote Start' => $carFeatures->remote_start,
        'GPS Navigation System' => $carFeatures->gps_navigation,
        'Heated Seats' => $carFeatures->heater_seat,
        'Climate Control' => $carFeatures->climate_control,
        'Rear Parking Sensors' => $carFeatures->rear_parking_sensors,
        'Leather Seats' => $carFeatures->leather_seats,
    ];
@endphp
<div class="bg-white rounded-lg p-4 space-y-4">
    <h1 class="text-xl md:text-2xl font-semibold mt-4">Car Specifications</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($carSpecifications as $key => $value)
            <div class="flex items-center space-x-4">
                @if ($value)
                    <svg data-lucide="circle-check" class="w-8 h-8  fill-green-500 text-white"></svg>
                @else
                    <svg data-lucide="circle-minus" class="w-8 h-8  fill-red-500 text-white"></svg>
                @endif
                <p class="text-base">{{ $key }}</p>
            </div>
        @endforeach
    </div>
</div>
