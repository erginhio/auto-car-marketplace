@props(['name'=>'','totalCars'=>''])
<div class="flex items-center space-x-4 w-full py-4">
    <img src="{{ asset('assets/images/profile.png') }}" alt="Profile" class="w-12 h-12 rounded-full">
    <div class="flex flex-col">
        <h1 class="font-semibold">{{$name}}</h1>
        <p class="text-sm text-gray-500">Total Cars: {{$totalCars}}</p>
    </div>
</div>