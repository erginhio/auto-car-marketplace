@props(['title'=>'', 'imagePath'=>'/assets/images/logo.png'])
<div class="text-center mb-12 space-y-4">
    <a href="{{route('home')}}"><img src="{{ asset($imagePath) }}" alt="logo"
                                     class="w-40 inline-block rounded-2xl shadow-lg hover:scale-105 transition duration-300" />
    </a>
    <h1 class="text-base sm:text-xl bold">{{ $title }}</h1>
</div>
