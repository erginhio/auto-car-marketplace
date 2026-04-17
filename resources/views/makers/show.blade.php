<x-app-layout>

    <div class="min-h-screen bg-gray-50 px-4 sm:px-6 lg:px-10 py-10">

        <div class="bg-white w-full rounded-2xl shadow-lg p-6 sm:p-10 max-w-2xl">

            <h1 class="text-3xl font-bold mb-6 text-gray-900">
                Maker Details
            </h1>

            <div class="space-y-4 text-gray-700">

                <p>
                    <span class="font-semibold">ID:</span>
                    {{ $maker->id }}
                </p>

                <p>
                    <span class="font-semibold">Name:</span>
                    {{ $maker->name }}
                </p>

                <p>
                    <span class="font-semibold">Created:</span>
                    {{ optional($maker->created_at)->format('Y-m-d H:i') ?? 'N/A' }}
                </p>

            </div>

            <div class="mt-8 flex gap-3">

                <a href="{{ route('makers.edit', $maker) }}"
                   class="px-5 py-2 bg-yellow-500 text-white rounded-xl">
                    Edit
                </a>

                <a href="{{ route('makers.index') }}"
                   class="px-5 py-2 bg-gray-200 rounded-xl">
                    Back
                </a>

            </div>

        </div>

    </div>

</x-app-layout>
