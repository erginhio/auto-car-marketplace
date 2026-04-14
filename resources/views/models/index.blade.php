<x-app-layout>

    <div class="min-h-screen bg-gray-50 px-4 sm:px-6 lg:px-10 py-8">

        {{-- HEADER --}}
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-end gap-4 mb-8">

            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                    Car Models
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Organized by maker in a clean production-style interface
                </p>
            </div>

            <a href="{{ route('models.create') }}"
               class="bg-main-600 text-white px-5 py-2.5 rounded-lg hover:bg-main-700 transition shadow text-sm font-semibold">
                + Add Model
            </a>

        </div>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="mb-6 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- EMPTY STATE --}}
        @if($models->filter(fn($m) => $m->maker)->isEmpty())
            <div class="bg-white p-6 text-center rounded-xl shadow text-gray-500 text-sm">
                No models found
            </div>
        @endif

        {{-- GROUP BY MAKER ID (FIX DUPLICATES) --}}
        @php
            $grouped = $models
                ->filter(fn($m) => $m->maker)
                ->groupBy(fn($m) => $m->maker->id);
        @endphp

        <div class="space-y-5">

            @foreach($grouped as $makerId => $items)

                @php
                    $makerName = $items->first()->maker->name;
                @endphp

                <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

                    {{-- MAKER HEADER --}}
                    <div class="flex items-center justify-between px-4 py-3 bg-gray-50 border-b">

                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-main-600"></span>

                            <h2 class="text-sm font-semibold text-gray-800">
                                {{ $makerName }}
                            </h2>
                        </div>

                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-md">
                            {{ $items->count() }} models
                        </span>

                    </div>

                    {{-- TABLE --}}
                    <div class="overflow-x-auto">

                        <table class="w-full text-xs">

                            <thead class="text-gray-500 uppercase bg-white border-b">
                            <tr>
                                <th class="px-4 py-2 text-left">ID</th>
                                <th class="px-4 py-2 text-left">Model Name</th>
                                <th class="px-4 py-2 text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($items as $model)
                                <tr class="border-b last:border-b-0 hover:bg-gray-50 transition">

                                    <td class="px-4 py-2 text-gray-500">
                                        {{ $model->id }}
                                    </td>

                                    <td class="px-4 py-2 font-medium text-gray-800">
                                        {{ $model->name }}
                                    </td>

                                    <td class="px-4 py-2">

                                        <div class="flex justify-end items-center gap-4">

                                            <a href="{{ route('models.edit', $model) }}"
                                               class="text-yellow-600 hover:text-yellow-700 text-xs font-medium">
                                                Edit
                                            </a>

                                            <form action="{{ route('models.destroy', $model) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Delete this model?')">

                                                @csrf
                                                @method('DELETE')

                                                <button class="text-red-600 hover:text-red-700 text-xs font-medium">
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="mt-6">
            {{ $models->links() }}
        </div>

    </div>

</x-app-layout>
