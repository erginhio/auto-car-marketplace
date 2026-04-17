@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-6">

        <h1 class="text-2xl font-bold mb-6">Edit Model</h1>

        <form action="{{ route('models.update', $model) }}" method="POST"
              class="bg-white p-6 rounded-lg shadow space-y-4">

            @csrf
            @method('PUT')

            {{-- NAME --}}
            <div>
                <label class="block text-sm font-medium">Model Name</label>
                <input type="text" name="name"
                       class="w-full border rounded px-3 py-2"
                       value="{{ old('name', $model->name) }}">
            </div>

            {{-- MAKER --}}
            <div>
                <label class="block text-sm font-medium">Maker</label>
                <select name="maker_id"
                        class="w-full border rounded px-3 py-2">

                    @foreach($makers as $maker)
                        <option value="{{ $maker->id }}"
                            {{ $model->maker_id == $maker->id ? 'selected' : '' }}>
                            {{ $maker->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- YEAR --}}
            <div>
                <label class="block text-sm font-medium">Year</label>
                <input type="number" name="year"
                       class="w-full border rounded px-3 py-2"
                       value="{{ old('year', $model->year) }}">
            </div>

            {{-- BUTTONS --}}
            <div class="flex justify-between">
                <a href="{{ route('models.index') }}"
                   class="px-4 py-2 bg-gray-200 rounded">
                    Cancel
                </a>

                <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update
                </button>
            </div>

        </form>

    </div>
@endsection
