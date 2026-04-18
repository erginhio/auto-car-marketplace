<form action="{{ route('car.search') }}" method="GET"
      id="carFilterForm"
      class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 w-full flex flex-col gap-6">

    {{-- TOP FILTERS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">

        {{-- MAKER --}}
        <select id="maker" name="maker_id"
                class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-black">
            <option value="">Select Maker</option>
            @foreach($makers as $maker)
                <option value="{{ $maker->id }}"
                    {{ request('maker_id') == $maker->id ? 'selected' : '' }}>
                    {{ $maker->name }}
                </option>
            @endforeach
        </select>

        {{-- MODEL --}}
        <select id="model" name="model_id"
                class="w-full h-12 px-4 rounded-lg border border-gray-300 bg-gray-100 cursor-not-allowed focus:ring-2 focus:ring-black"
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

        {{-- COMPONENTS --}}
        <x-car-type-selector :value="request('car_type_id')" />
        <x-fuel-type-selector :value="request('fuel_type_id')" />

    </div>

    {{-- DIVIDER --}}
    <div class="border-t"></div>

    {{-- RANGE SECTION --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- YEAR --}}
        <div class="flex flex-col gap-3">
            <label class="text-sm font-semibold text-gray-700">Year Range</label>

            <div class="flex gap-4">
                <input type="number" name="yearFrom" placeholder="From"
                       value="{{ request('yearFrom') }}"
                       class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-black">

                <input type="number" name="yearTo" placeholder="To"
                       value="{{ request('yearTo') }}"
                       class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-black">
            </div>
        </div>

        {{-- PRICE --}}
        <div class="flex flex-col gap-3">
            <label class="text-sm font-semibold text-gray-700">Price Range ($)</label>

            <div class="flex gap-4">
                <input type="number" name="priceFrom" placeholder="From"
                       value="{{ request('priceFrom') }}"
                       class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-black">

                <input type="number" name="priceTo" placeholder="To"
                       value="{{ request('priceTo') }}"
                       class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-black">
            </div>
        </div>

    </div>

    {{-- DIVIDER --}}
    <div class="border-t"></div>

    {{-- ACTIONS --}}
    <div class="flex justify-between items-center">

        <p class="text-sm text-gray-500">
            Filter cars based on your preferences
        </p>

        <div class="flex gap-3">

            {{-- RESET --}}
            <button type="button" id="resetBtn"
                    class="px-4 py-2 text-gray-500 hover:text-red-500 transition">
                Reset
            </button>

            {{-- SEARCH --}}
            <button type="submit"
                    class="px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                Search
            </button>

        </div>

    </div>

</form>

{{-- JS --}}
<script>
    const form = document.getElementById('carFilterForm');
    const makerSelect = document.getElementById('maker');
    const modelSelect = document.getElementById('model');
    const resetBtn = document.getElementById('resetBtn');

    if (makerSelect && modelSelect) {

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

        // Keep selected after reload
        if (makerSelect.value) {
            filterModels(makerSelect.value);
        }

        // ✅ RESET LOGIC
        resetBtn.addEventListener('click', () => {

            // Reset form inputs
            form.reset();

            // Reset model dropdown completely
            modelSelect.innerHTML = '<option value="">Select Model</option>';
            modelSelect.disabled = true;
            modelSelect.classList.add('bg-gray-100', 'cursor-not-allowed');

            // Also reset maker manually (important for UI sync)
            makerSelect.value = "";
        });
    }
</script>
