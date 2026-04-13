@props(['title'=>'', 'imagePath'=>'/assets/images/logo.png'])
<div class="text-center mb-12 space-y-4">
    <a href="{{route('home')}}"><img src="{{ asset($imagePath) }}" alt="logo"
            class='w-40 inline-block' />
    </a>
    <h1 class="text-base sm:text-xl bold">{{ $title }}</h1>
</div>
