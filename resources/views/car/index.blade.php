<x-app-layout title="My Car">
    <x-layouts.main-layout title="My Cars">

        <table
            class="h-full w-full text-sm text-left text-gray-500 bg-white rounded-lg border-b border-gray-200">

            <thead class="text-xs text-gray-700 uppercase">
            <tr>
                <th class="px-6 py-3 border-b">Image</th>
                <th class="text-center px-6 py-3 border-b">Title</th>
                <th class="text-center px-6 py-3 border-b">Date</th>
                <th class="text-center px-6 py-3 border-b">Published</th>
                <th class="px-6 py-3 border-b text-right">Action</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($cars as $car)
                <tr class="border-b">

                    <!-- ✅ IMAGE LEFT -->
                    <td class="px-6 py-6">
                        <a href="{{ route('car.show', $car) }}">

                            <img
                                src="{{ $car->primaryImage
                                        ? asset('/storage/'.$car->primaryImage->image_path)
                                        : asset('images/no-image.png') }}"
                                alt="{{ $car->model->name }}"
                                class="w-30 h-20 object-cover rounded-2xl shadow-md border border-gray-200 block"
                            >

                        </a>
                    </td>

                    <!-- TITLE -->
                    <td class="px-6 py-4 text-center font-medium text-gray-900">
                        {{ $car->year }} - {{ $car->maker->name }} {{ $car->model->name }}
                    </td>

                    <!-- DATE -->
                    <td class="px-6 py-4 text-center">
                        {{ $car->getCreatedDate() }}
                    </td>

                    <!-- PUBLISHED -->
                    <td class="px-6 py-4 text-center">
                        {{ $car->published_at ? 'Yes' : 'No' }}
                    </td>

                    <!-- ACTIONS -->
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end space-x-2">

                            <a href="{{ route('car.edit', $car) }}" class="text-blue-500 hover:text-blue-700">
                                <svg data-lucide="pencil" class="w-6 h-6"></svg>
                            </a>

                            <a href="{{ route('car.show', $car) }}" class="text-green-500 hover:text-green-700">
                                <svg data-lucide="image" class="w-6 h-6"></svg>
                            </a>

                            <form action="{{ route('car.destroy', $car) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg data-lucide="trash-2" class="w-6 h-6"></svg>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

            @empty
                <tr>
                    <td colspan="5" class="h-[350px] px-6 py-4 text-center">
                        You don't have any car yet.
                        <a href="{{ route('car.create') }}" class="text-blue-500">Add new car</a>
                    </td>
                </tr>
            @endforelse
            </tbody>

        </table>

        {{ $cars->onEachSide(1)->links('pagination') }}

    </x-layouts.main-layout>
</x-app-layout>
