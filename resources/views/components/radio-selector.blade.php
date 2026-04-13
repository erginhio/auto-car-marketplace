@props([
    'items' => [],
    'name' => '',
    'title',
    'value'=>'',
])

<label for="{{ $name }}" class="text-sm mb-2 block font-medium ">{{ $title }}</label>
<div class="flex items-center space-x-4">
    @foreach ($items as $item)
    <div class="flex items-center ">
            @if ($value == $item->id)
                <input id="{{ $name }}-{{ $item->id }}" type="radio" value="{{ $item->id }}"
                     name="{{ $name }}" class="hidden peer" checked/>
            @else
                <input id="{{ $name }}-{{ $item->id }}" type="radio" value="{{ $item->id }}"
                    name="{{ $name }}" class="hidden peer" />

            @endif
            <label for="{{ $name }}-{{ $item->id }}"
                class="border border-gray-300 rounded-full px-4 py-2 text-sm font-medium text-gray-900 peer-checked:bg-blue-500 peer-checked:text-white  cursor-pointer ">
                {{ $item->name }}
            </label>
        </div>

    @endforeach
</div>
@error($name)
<span class="text-red-500 text-sm">{{$message}}</span>
@enderror

