@php
    $features = [
        'air_conditioning' => 'Air Conditioning',
        'power_windows' => 'Power Windows',
        'power_door_locks' => 'Power Door Locks',
        'abs' => 'ABS',
        'cruise_control' => 'Cruise Control',
        'bluetooth_connectivity' => 'Bluetooth Connectivity',
        'remote_start' => 'Remote Start',
        'gps_navigation' => 'GPS Navigation System',
        'heater_seat' => 'Heated Seats',
        'climate_control' => 'Climate Control',
        'rear_parking_sensors' => 'Rear Parking Sensors',
        'leather_seats' => 'Leather Seats',
    ];
@endphp

<div class="bg-white rounded-lg p-4 space-y-4">
    <h1 class="text-xl md:text-2xl font-semibold mt-4">Car Features</h1>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($features as $name => $label)
            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="checkbox"
                       name="features[{{ $name }}]"
                       class="w-5 h-5 text-blue-600 border-gray-300 rounded">

                <span>{{ $label }}</span>
            </label>
        @endforeach
    </div>
</div>
