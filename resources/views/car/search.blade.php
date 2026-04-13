<x-app-layout title="Car Detail">
    <main class="max-w-screen-2xl mx-auto h-full flex-grow w-full p-2 md:p-4 space-y-4">

        {{-- header --}}
        <section class="py-4 space-y-4 md:gap-2 flex flex-col w-full justify-between md:flex-row md:items-center">
            <div>
                <h1 class="text-3xl font-bold md:text-nowrap">Define Your Search Criteria</h1>
            </div>

            <div class="w-full md:max-w-[500px] gap-2 flex-col md:flex-row flex">
                <form action="{{ route('car.search') }}" method="GET" class="w-full md:max-w-[500px] gap-2 flex-col md:flex-row flex">
                    <x-input-field name="search" placeholder="Search" :value="request('search')" />

                    <div class="md:max-w-[200px] w-full">
                        <x-selector name="orderBy" placeholder="Order By" :items="$orderBy" :value="request('orderBy')"/>
                    </div>
                </form>
            </div>
        </section>

        {{-- main --}}
        <section class="flex flex-col md:flex-row gap-4">

            {{-- sidebar --}}
            <form action="{{ route('car.search') }}" method="GET"
                  class="md:max-w-[350px] w-full flex flex-col gap-6 bg-white rounded-lg p-4">

                {{-- total --}}
                <div class="p-4 border-2 border-dashed border-gray-300 rounded-lg">
                    <h1 class="text-xl">
                        Total Result: <span class="font-bold">{{ $cars->total() }}</span> Cars
                    </h1>
                </div>

                <h1 class="text-xl font-bold">By Categories</h1>

                <div class="flex flex-col gap-4">

                    {{-- ✅ MAKER --}}
                    <div>
                        <h1 class="text-sm mb-2 block font-medium">Maker</h1>
                        <select id="maker" name="maker_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Maker</option>
                            @foreach($makers as $maker)
                                <option value="{{ $maker->id }}"
                                    {{ request('maker_id') == $maker->id ? 'selected' : '' }}>
                                    {{ $maker->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- ✅ MODEL --}}
                    <div>
                        <h1 class="text-sm mb-2 block font-medium">Model</h1>
                        <select id="model" name="model_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-blue-500"
                                disabled>
                            <option value="">Select Model</option>
                            @foreach($models as $model)
                                <option value="{{ $model->id }}"
                                        data-maker="{{ $model->maker_id }}"
                                    {{ request('model_id') == $model->id ? 'selected' : '' }}>
                                    {{ $model->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- car type --}}
                    <x-car-type-selector label="Car Type" :value="request('car_type_id')" />

                    {{-- year --}}
                    <div>
                        <h1 class="text-sm mb-2 block font-medium">Year</h1>
                        <div class="flex gap-2">
                            <x-input-field name="yearFrom" placeholder="Year from" :value="request('yearFrom')"/>
                            <x-input-field name="yearTo" placeholder="Year to" :value="request('yearTo')"/>
                        </div>
                    </div>

                    {{-- price --}}
                    <div>
                        <h1 class="text-sm mb-2 block font-medium">Price</h1>
                        <div class="flex gap-2">
                            <x-input-field name="priceFrom" placeholder="Price from" :value="request('priceFrom')"/>
                            <x-input-field name="priceTo" placeholder="Price to" :value="request('priceTo')"/>
                        </div>
                    </div>

                    <x-fuel-type-selector label="Fuel Type" :value="request('fuel_type_id')"/>

                    {{-- buttons --}}
                    <div class="flex gap-2">
                        <a href="{{ route('car.search') }}" class="w-full">
                            <x-button title="Reset"
                                      customClass="w-full py-3 border-2 border-blue-600 text-blue-600 rounded-md hover:bg-blue-600 hover:text-white"/>
                        </a>

                        <x-button title="Search" type="submit" />
                    </div>

                </div>
            </form>

            {{-- results --}}
            @if ($cars->isEmpty())
                <div class="flex flex-col justify-center items-center bg-white rounded-lg p-6 w-full">
                    <h2 class="text-2xl font-semibold">No Results Found</h2>
                </div>
            @else
                <div class="flex flex-col gap-6 w-full">
                    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                        @foreach ($cars as $car)
                            <x-car-card :$car />
                        @endforeach
                    </div>

                    {{ $cars->onEachSide(0)->links('pagination') }}
                </div>
            @endif

        </section>
    </main>
</x-app-layout>

{{-- ✅ JS --}}
<script>
    const makerSelect = document.getElementById('maker');
    const modelSelect = document.getElementById('model');

    const allModels = Array.from(modelSelect.options);

    function filterModels(selectedMaker) {
        modelSelect.innerHTML = '<option value="">Select Model</option>';

        if (!selectedMaker) {
            modelSelect.disabled = true;
            modelSelect.classList.add('bg-gray-100', 'cursor-not-allowed');
            return;
        }

        modelSelect.disabled = false;
        modelSelect.classList.remove('bg-gray-100', 'cursor-not-allowed');

        allModels.forEach(option => {
            if (!option.value) return;

            if (option.dataset.maker === selectedMaker) {
                modelSelect.appendChild(option);
            }
        });
    }

    makerSelect.addEventListener('change', function () {
        filterModels(this.value);
        modelSelect.value = "";
    });

    // 🔥 keep state after reload
    if (makerSelect.value) {
        filterModels(makerSelect.value);
    }
</script>
