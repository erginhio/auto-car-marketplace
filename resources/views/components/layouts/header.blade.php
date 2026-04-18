@php
    $myAccountData=['My Cars' => 'car.index', 'My Favourites Cars' => 'car.watchlist'];
@endphp

<nav class="md:flex-wrap bg-white border p-6">
    <div class="max-w-screen-2xl mx-auto flex items-center justify-between">

        <div class="flex items-center flex-shrink-0 text-white">
            <a href="/" class="font-semibold text-xl tracking-tight max-w-40 relative group">

                <img
                    src="{{ asset('/assets/images/logo.png') }}"
                    alt="logo"
                    class="w-50 inline-block
                           rounded-2xl bg-white p-1
                           transition-transform transform
                           group-hover:scale-110 group-hover:rotate-6
                           duration-500 shadow-md"
                />

            </a>
        </div>

        <x-layouts.menu :$myAccountData/>
        <x-layouts.mobile-menu :$myAccountData/>

    </div>
</nav>
