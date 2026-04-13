@props(['name'=>'', 'type'=>'text', 'placeholder'=>'', 'class'=>'', 'label'=>'', 'labelClass'=>'', 'value'=>''])
{{--
    This is a reusable input field component with label support.
    Use it like this:
    <x-input-field name="email" label="Email Address" placeholder="Enter your Email Address" />
 --}}
<div class="w-full ">
    @if ($label)<label class="text-sm mb-2 block {{ $labelClass }}">{{ $label }}</label>@endif
    <input name="{{ $name }}" type="{{ $type }}" id="{{ $name }}"
        class="block appearance-none w-full px-4 py-3 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500{{ $class }}"
        placeholder="{{ $placeholder }}" value="{{$value}}" />
    @error($name)
        <span class="text-red-500 text-sm">{{$message}}</span>
    @enderror
</div>
