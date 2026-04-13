@php
 $myAccountData=['My Cars' => 'car.index', 'My Favourites Cars' => 'car.watchlist'];
@endphp
<nav class="  md:flex-wrap bg-white border p-6 ">
    <div class="max-w-screen-2xl mx-auto flex items-center justify-between">
        <div class="flex items-center flex-shrink-0 text-white">
            <a href="/" class="font-semibold text-xl tracking-tight max-w-20 relative group">
                <img src="{{ asset('/assets/images/logo.png') }}" alt="logo" class='w-40 inline-block transition-transform transform group-hover:scale-110 group-hover:rotate-12 group-hover:animate-pulse duration-500' />
            </a>
        </div>
        <x-layouts.menu :$myAccountData/>
        <x-layouts.mobile-menu :$myAccountData/>
    </div>
</nav>

