@props(['type' => 'button', 'class' => 'rounded-md', 'title' => '', 'customClass' => '', 'leftIcon' => '', 'rightIcon' => ''])

{{--
    This is a reusable button component.
    Use it like this:
    <x-button type="submit" class="additional-classes" title="Click Me" />
--}}

<button type="{{ $type }}" @if($customClass) class="{{ $customClass }}" @else class="w-full py-3 px-4  text-sm tracking-wider  font-semibold text-white bg-main-600 hover:bg-main-700 focus:outline-none {{ $class }}" @endif >
    {{ $leftIcon }}
    {{ $title }}
    {{ $rightIcon }}
</button>

