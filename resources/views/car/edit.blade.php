<x-app-layout title="Edit Car">
    <x-layouts.main-layout title="Edit Car">
        <div class="p-4">
            <form action="{{ route('car.update', $car) }}" method="POST"
                  class="flex w-full flex-col xl:flex-row gap-4"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- REQUIRED -->
                <input type="hidden" name="deleted_images" id="deleted_images">

                {{-- LEFT SIDE --}}
                <div class="flex gap-6 w-full flex-col">

                    <div class="flex gap-4 w-full">
                        <x-model-selector label="Model" :value="$car->model?->id" />
                        <x-maker-selector label="Maker" :value="$car->maker?->id" />
                        <x-input-field name="year" label="Year" :value="$car->year" />
                    </div>

                    <x-car-type-selector type="radio" :value="$car->carType?->id" />

                    <div class="flex gap-4 w-full">
                        <x-input-field name="price" label="Price" :value="$car->price" />
                        <x-input-field name="mileage" label="Mileage" :value="$car->mileage" />
                    </div>

                    <x-fuel-type-selector type="radio" :value="$car->fuelType?->id" />

                    <x-input-field name="phone" label="Phone" :value="$car->phone" />

                    {{-- DESCRIPTION --}}
                    <textarea name="description"
                              class="block w-full px-4 py-3 border border-gray-300 rounded-md">{{ $car->description }}</textarea>

                    {{-- 🚗 FEATURES (COMPONENT - PERFECT POSITION) --}}
                    <x-car-features-section
                        :features="$car->features"
                    />

                    {{-- BUTTON --}}
                    <button type="submit" class="bg-blue-600 text-white py-2 rounded">
                        Update
                    </button>

                </div>

                {{-- DIVIDER --}}
                <span class="bg-gray-200 w-[2px]"></span>

                {{-- RIGHT SIDE --}}
                <div class="border border-dashed border-gray-300 rounded-lg p-4 w-full xl:max-w-[500px]">

                    <!-- DROP ZONE -->
                    <div class="flex flex-col justify-center items-center bg-gray-50 border-2 border-dashed border-gray-300 h-[200px] rounded-lg">
                        <label for="images"
                               class="flex flex-col items-center justify-center w-full h-full cursor-pointer">
                            <svg data-lucide="image" class="w-12 h-12 text-gray-400"></svg>
                            <p class="text-gray-600 text-sm">Drag and drop images here</p>
                            <p class="text-gray-600 text-xs">Or click to select images</p>
                            <input type="file" name="images[]" id="images" multiple class="hidden">
                        </label>
                    </div>

                    <!-- PREVIEW -->
                    <ul id="images-preview" class="grid grid-cols-3 gap-4 mt-4"></ul>

                </div>

            </form>
        </div>
    </x-layouts.main-layout>
</x-app-layout>


<script>
    const input = document.getElementById('images');
    const preview = document.getElementById('images-preview');
    const deletedInput = document.getElementById('deleted_images');
    const form = document.querySelector('form');

    const existingImages = @js($car->images);

    let filesArray = [];
    let deletedImages = [];

    // ✅ LOAD EXISTING IMAGES
    existingImages.forEach(image => {
        const div = document.createElement('div');
        div.className = "relative";
        div.dataset.id = image.id;
        div.dataset.type = "existing";

        div.innerHTML = `
            <img src="/storage/${image.image_path}" width="120">
            <button type="button" class="delete-btn">✕</button>
        `;

        preview.appendChild(div);
    });

    // ✅ ADD NEW IMAGES
    input.addEventListener('change', (e) => {
        const files = Array.from(e.target.files);

        files.forEach(file => {
            const id = Date.now() + Math.random();

            filesArray.push({ file, id });

            const reader = new FileReader();

            reader.onload = (e) => {
                const div = document.createElement('div');
                div.dataset.id = id;
                div.dataset.type = "new";

                div.innerHTML = `
                    <img src="${e.target.result}" width="120">
                    <button type="button" class="delete-btn">✕</button>
                `;

                preview.appendChild(div);
            };

            reader.readAsDataURL(file);
        });

        updateFiles();
    });

    // ✅ DELETE HANDLER
    preview.addEventListener('click', (e) => {
        if (!e.target.classList.contains('delete-btn')) return;

        const div = e.target.closest('div');
        const id = div.dataset.id;
        const type = div.dataset.type;

        div.remove();

        if (type === "existing") {
            deletedImages.push(Number(id));
            deletedInput.value = deletedImages.join(',');
        }

        if (type === "new") {
            filesArray = filesArray.filter(f => f.id != id);
            updateFiles();
        }
    });

    function updateFiles() {
        const dt = new DataTransfer();

        filesArray.forEach(item => dt.items.add(item.file));

        input.files = dt.files;
    }

    // 🔥 ENSURE VALUE IS SENT
    form.addEventListener('submit', () => {
        deletedInput.value = deletedImages.join(',');
    });
</script>
