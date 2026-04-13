@props([
    'items'=>[],
    'name'=>'',
    'placeholder'=>'-- Select --',
    'label'=>'',
    'labelClass'=>'',
    'class'=>'',
    'value'=>''])
<div class="w-full">
    @if ($label)<label class="text-sm mb-2 block font-medium {{$labelClass}}">{{ $label }}</label>@endif
    <div class="relative w-full ">
        <select class="block appearance-none w-full px-4 py-3 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 {{$class}}" name="{{ $name }}" id="{{ $name }}">
            <option value=""  selected hidden>{{ $placeholder }} </option>
            @forelse ($items as $item )
                @if ($value == $item->id)
                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                @else
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endif
            @empty
                <option value="" disabled > No data </option>
            @endforelse
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
            <svg data-lucide="chevron-down" class="w-4 h-4 "></svg>
        </div>
    </div>
    @error($name)
        <span class="text-red-500 text-sm">{{$message}}</span>
    @enderror
</div>

