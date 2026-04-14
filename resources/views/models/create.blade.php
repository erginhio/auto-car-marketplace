<x-app-layout>

    <div class="min-h-screen bg-gray-50 px-4 sm:px-6 lg:px-10 py-8">

        {{-- HEADER --}}
        <div class="mb-8">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                Create Model
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Add a new car model and assign it to a maker
            </p>
        </div>

        {{-- FORM CONTAINER --}}
        <div class="max-w-2xl">

            <form action="{{ route('models.store') }}" method="POST"
                  class="bg-white border rounded-xl shadow-sm p-6 space-y-6">

                @csrf

                {{-- MODEL NAME --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        Model Name
                    </label>

                    <input type="text" name="name"
                           value="{{ old('name') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-main-600 focus:ring-main-600 text-sm px-3 py-2"
                           placeholder="e.g. Corolla">

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- MAKER --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        Maker
                    </label>

                    <select name="maker_id"
                            class="w-full rounded-lg border-gray-300 focus:border-main-600 focus:ring-main-600 text-sm px-3 py-2">

                        <option value="">Select a maker</option>

                        @foreach($makers as $maker)
                            <option value="{{ $maker->id }}">
                                {{ $maker->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('maker_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- INFO BOX (ENTERPRISE TOUCH) --}}
                <div class="bg-gray-50 border rounded-lg p-4 text-xs text-gray-500">
                    Make sure the model is assigned to the correct maker. Models without a maker will not appear in the system.
                </div>

                {{-- ACTIONS --}}
                <div class="flex items-center justify-between pt-2">

                    <a href="{{ route('models.index') }}"
                       class="text-sm text-gray-600 hover:text-gray-900">
                        Cancel
                    </a>

                    <button type="submit"
                            class="bg-main-600 hover:bg-main-700 text-white px-5 py-2 rounded-lg text-sm font-semibold shadow transition">
                        Save Model
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
