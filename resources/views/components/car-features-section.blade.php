@props(['features' => null])

@php
    $allFeatures = [
        'air_conditioning' => 'Air Conditioning',
        'power_windows' => 'Power Windows',
        'power_door_locks' => 'Power Door Locks',
        'abs' => 'ABS',
        'cruise_control' => 'Cruise Control',
        'bluetooth_connectivity' => 'Bluetooth',
        'remote_start' => 'Remote Start',
        'gps_navigation' => 'GPS Navigation',
        'heater_seat' => 'Heated Seats',
        'climate_control' => 'Climate Control',
        'rear_parking_sensors' => 'Rear Parking Sensors',
        'leather_seats' => 'Leather Seats',
    ];
@endphp

<div class="mt-4">
    <h3 class="text-lg font-semibold mb-2">Features</h3>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
        @foreach($allFeatures as $key => $label)
            <label class="flex items-center gap-2 border p-2 rounded cursor-pointer">

                <input
                    type="checkbox"
                    name="features[{{ $key }}]"
                    @checked(optional($features)->$key)
                >

                <span>{{ $label }}</span>
            </label>
        @endforeach
    </div>
</div>
