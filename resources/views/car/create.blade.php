<x-app-layout title="Add New Car">
    <x-layouts.main-layout title="Add New Car">
        <div class="p-4">
            <form action="{{ route('car.store') }}" method="POST"
                  class="flex w-full flex-col xl:flex-row gap-4"
                  enctype="multipart/form-data">
                @csrf

                {{-- LEFT SIDE --}}
                <div class="flex gap-6 w-full flex-col">

                    <div class="flex gap-4 w-full">

                        <select id="maker" name="maker_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Maker</option>
                            @foreach($makers as $maker)
                                <option value="{{ $maker->id }}">
                                    {{ $maker->name }}
                                </option>
                            @endforeach
                        </select>

                        <select id="model" name="model_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-blue-500"
                                disabled>
                            <option value="">Select Model</option>
                            @foreach($models as $model)
                                <option value="{{ $model->id }}"
                                        data-maker="{{ $model->maker_id }}">
                                    {{ $model->name }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-field name="year" placeholder="Year" label="Year" />
                    </div>

                    <x-car-type-selector type="radio" />

                    <div class="flex gap-4 w-full">
                        <x-input-field name="price" placeholder="Price" label="Price" />
                        <x-input-field name="mileage" placeholder="Mileage" label="Mileage (ml)" />
                    </div>

                    <x-fuel-type-selector type="radio" />

                    <x-input-field name="phone" placeholder="Phone" label="Phone" />

                    <textarea name="description"
                              placeholder="Enter car description"
                              class="block w-full px-4 py-3 border border-gray-300 rounded-md"></textarea>

                    <x-car-features-section />
                    {{-- buttons desktop --}}
                    <div class="hidden xl:flex justify-end">
                        <div class="max-w-[300px] flex w-full gap-4">
                            <button type="reset"
                                    class="w-full border border-blue-600 text-blue-600 py-2 rounded">
                                Reset
                            </button>

                            <button type="submit"
                                    class="w-full bg-blue-600 text-white py-2 rounded">
                                Create
                            </button>
                        </div>
                    </div>

                </div>

                {{-- DIVIDER --}}
                <span class="bg-gray-200 w-[2px]"></span>

                {{-- RIGHT SIDE (UPLOAD) --}}
                <div class="border border-dashed border-gray-300 rounded-lg p-4 w-full xl:max-w-[500px]">

                    <div class="flex flex-col justify-center items-center bg-gray-50 border-2 border-dashed h-[200px] rounded-lg">
                        <label for="images" class="cursor-pointer text-center">
                            <p class="text-gray-600">Click or Drag images</p>
                            <input type="file" name="images[]" id="images" multiple class="hidden">
                        </label>
                    </div>

                    {{-- preview --}}
                    <ul id="images-preview" class="flex flex-wrap gap-4 mt-4"></ul>


                </div>


                {{-- buttons mobile --}}
                <div class="flex xl:hidden justify-end w-full">
                    <div class="max-w-[300px] flex w-full gap-4">
                        <button type="reset"
                                class="w-full border border-blue-600 text-blue-600 py-2 rounded">
                            Reset
                        </button>
                        <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded">
                            Create
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </x-layouts.main-layout>
</x-app-layout>

<script>
    const input = document.getElementById('images');
    const preview = document.getElementById('images-preview');

    let filesArray = [];

    input.addEventListener('change', (e) => {
        const newFiles = Array.from(e.target.files);
        filesArray = [...filesArray, ...newFiles];
        updateFiles();
        renderImages();
    });

    function renderImages() {
        preview.innerHTML = "";

        filesArray.forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = (e) => {
                const li = document.createElement('li');
                li.className = "relative";

                li.innerHTML = `
                    <img src="${e.target.result}" class="w-[120px] h-[120px] object-cover rounded border"/>
                    <button type="button"
                        class="absolute top-0 right-0 bg-white border rounded-full px-2">
                        ✕
                    </button>
                `;

                li.querySelector('button').onclick = () => {
                    filesArray.splice(index, 1);
                    updateFiles();
                    renderImages();
                };

                preview.appendChild(li);
            };

            reader.readAsDataURL(file);
        });
    }

    function updateFiles() {
        const dataTransfer = new DataTransfer();

        filesArray.forEach(file => {
            dataTransfer.items.add(file);
        });

        input.files = dataTransfer.files;
    }

    // ✅ MAKER → MODEL FILTERING
    const makerSelect = document.getElementById('maker');
    const modelSelect = document.getElementById('model');

    const allModels = Array.from(modelSelect.options);

    makerSelect.addEventListener('change', function () {
        const selectedMaker = this.value;

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

        modelSelect.value = "";
    });
</script>
