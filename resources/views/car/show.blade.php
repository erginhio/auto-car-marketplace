<x-app-layout title="Car Detail">

    <main class="max-w-screen-2xl mx-auto h-full flex-grow w-full p-2 md:p-4 space-y-4">

        <div class="py-4">
            <h1 class="text-3xl font-bold">
                {{ optional($car->maker)->name }}
                {{ optional($car->model)->name }}
                - {{ $car->year }}
            </h1>

            {{-- ❌ REMOVED CITY --}}
            <p class="text-gray-600">
                {{ $car->published_at }}
            </p>
        </div>

        <div class="flex gap-4 flex-col xl:flex-row">

            {{-- image details --}}
            <x-car-show-image
                :primaryImage="$car->primaryImage ? $car->primaryImage->image_path : null"
                :images="$car->images"
                :imageTitle="optional($car->model)->name"
            />

            {{-- right side --}}
            <div class="bg-white rounded-lg p-4 md:p-8 xl:max-w-[500px] w-full flex flex-col justify-between">

                {{-- price + favorite --}}
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl font-bold py-4">
                        ${{ number_format($car->price ?? 0) }}
                    </h1>

                    <div class="flex gap-2">
                        @can('edit', $car)
                            <a href="{{ route('car.edit', $car) }}" class="text-blue-500 hover:text-blue-700">
                                <svg data-lucide="pencil" class="w-6 h-6"></svg>
                            </a>
                        @endcan

                        <button class="{{ $favorite ? 'opacity-50' : '' }} hover:opacity-100 hover:scale-110 transition-all duration-300">
                            <svg data-lucide="heart"
                                 class="w-5 h-5 {{ $favorite ? 'fill-red-500 text-red-500' : '' }}">
                            </svg>
                        </button>
                    </div>
                </div>

                <hr>

                {{-- car details --}}
                <x-car-detail :$car />

                <hr>

                {{-- owner --}}
                <x-car-owner-profile
                    :name="optional($car->owner)->name"
                    :totalCars="$car->owner ? $car->owner->cars()->count() : 0"
                />

                {{-- contact --}}
                <x-car-owner-contact
                    :phone="$car->phone ?? optional($car->owner)->phone"
                />

            </div>
        </div>

        {{-- description --}}
        <x-car-description :carDescription="$car->description" />

        {{-- specs --}}
        <x-car-spectification :carFeatures="$car->features" />

    </main>

</x-app-layout>
