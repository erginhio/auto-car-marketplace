<x-app-layout>

    <div class="min-h-screen bg-gray-50 px-4 sm:px-6 lg:px-10 py-10">

        {{-- HEADER --}}
        <div class="mb-10">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900">
                Edit Maker
            </h1>

            <p class="mt-3 text-gray-500 text-lg max-w-2xl">
                Update the details of this vehicle maker.
            </p>
        </div>

        {{-- FORM CONTAINER --}}
        <div class="bg-white w-full rounded-2xl shadow-lg p-6 sm:p-10">

            <form method="POST"
                  action="{{ route('makers.update', $maker) }}"
                  class="space-y-6 w-full">

                @csrf
                @method('PUT')

                {{-- NAME FIELD --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Maker Name
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $maker->name) }}"
                           placeholder="Enter maker name"
                           class="w-full p-4 border border-gray-300 rounded-xl
                                  focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400
                                  outline-none transition">

                    @error('name')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-4">

                    <a href="{{ route('makers.index') }}"
                       class="w-full sm:w-auto text-center px-6 py-3 bg-gray-200 rounded-xl hover:bg-gray-300 transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="w-full sm:w-auto px-6 py-3 bg-yellow-500 text-white rounded-xl hover:bg-yellow-600 transition shadow">
                        Update Maker
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
