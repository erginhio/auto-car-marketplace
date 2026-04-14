<x-app-layout>

    <div class="min-h-screen bg-gray-50 px-4 sm:px-6 lg:px-10 py-8">

        {{-- HEADER (BIG + PROFESSIONAL) --}}
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-end gap-6 mb-10">

            {{-- TITLE BLOCK --}}
            <div>
                <h1 class="text-5xl sm:text-6xl font-extrabold tracking-tight text-gray-900">
                    Makers
                </h1>

                <p class="mt-3 text-lg text-gray-500 max-w-2xl">
                    Manage and organize all vehicle makers in your system with full CRUD control.
                </p>
            </div>

            {{-- BUTTON --}}
            <a href="{{ route('makers.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-main-600 text-white px-7 py-4 rounded-2xl hover:bg-main-700 transition shadow-lg text-lg font-semibold">
                + Add Maker
            </a>

        </div>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-xl shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- EMPTY STATE --}}
        @if($makers->isEmpty())
            <div class="bg-white p-10 text-center rounded-2xl shadow text-gray-500">
                No makers found
            </div>
        @endif

        {{-- RESPONSIVE GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($makers as $maker)
                <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-6 flex flex-col justify-between">

                    {{-- INFO --}}
                    <div>
                        <p class="text-xs text-gray-400">
                            ID: {{ $maker->id }}
                        </p>

                        <h2 class="text-2xl font-bold text-gray-800 mt-2">
                            {{ $maker->name }}
                        </h2>
                    </div>

                    {{-- ACTIONS --}}
                    <div class="flex items-center justify-between mt-6">

                        <div class="flex gap-4 text-sm">

                            <a href="{{ route('makers.show', $maker) }}"
                               class="text-blue-600 hover:underline font-medium">
                                View
                            </a>

                            <a href="{{ route('makers.edit', $maker) }}"
                               class="text-yellow-600 hover:underline font-medium">
                                Edit
                            </a>

                        </div>

                        <form action="{{ route('makers.destroy', $maker) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this maker?')">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 hover:underline text-sm font-medium">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>
            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="mt-10">
            {{ $makers->links() }}
        </div>

    </div>

</x-app-layout>
