@props(['car' => null, 'favorite' => false])

<div class="w-full min-w-[200px] flex flex-col rounded-lg bg-white shadow-sm hover:shadow-lg hover:scale-105 transition-all duration-300 cursor-pointer">

    {{-- image --}}
    <div class="overflow-hidden rounded-t-lg sm:min-h-[200px] bg-gray-200">
        <a href="{{ route('car.show', $car) }}">
            <img
                src="{{ $car->primaryImage ? asset('storage/' . $car->primaryImage->image_path) : asset('images/no-image.png') }}"
                alt="{{ optional($car->model)->name ?? 'Car image' }}"
                class="w-full h-full object-cover transition-all duration-300 transform hover:scale-110"
            >
        </a>
    </div>

    {{-- details --}}
    <div class="p-4 space-y-2 flex justify-between flex-col">

        {{-- city + favorite --}}
        <div class="flex items-center justify-between">

            {{-- city (SAFE) --}}
            @if($car && $car->city)
                <p class="text-sm opacity-50">{{ $car->city->name }}</p>
            @endif

            {{-- favorite --}}
            <button class="{{ $favorite ? 'opacity-50' : '' }} hover:opacity-100 hover:scale-110 transition-all duration-300">
                <svg data-lucide="heart" class="w-5 h-5 {{ $favorite ? 'fill-red-500 text-red-500' : '' }}"></svg>
            </button>
        </div>

        {{-- name --}}
        <h1 class="font-semibold">
            {{ $car->year ?? '' }} -
            {{ optional($car->maker)->name }}
            {{ optional($car->model)->name }}
        </h1>

        {{-- price --}}
        <p class="font-semibold text-lg">
            ${{ number_format($car->price ?? 0) }}
        </p>

        {{-- tags --}}
        <div class="flex flex-wrap gap-2">
            <div class="w-full border-t border-gray-200 my-2"></div>

            @if($car && $car->carType)
                <button class="bg-gray-200 py-2 px-3 text-sm rounded-md">
                    {{ $car->carType->name }}
                </button>
            @endif

            @if($car && $car->fuelType)
                <button class="bg-gray-200 py-2 px-3 text-sm rounded-md">
                    {{ $car->fuelType->name }}
                </button>
            @endif
        </div>

    </div>
</div>
