<section class="relative bg-black text-white overflow-hidden">

    {{-- BACKGROUND RADIAL GLOW --}}
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_#7A00E6_0%,_#000_70%)] opacity-40"></div>

    {{-- RED JAPAN SUN --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                w-[700px] h-[700px] bg-red-600 opacity-20 rounded-full blur-[180px]">
    </div>

    {{-- MAIN CONTENT --}}
    <div class="relative max-w-6xl mx-auto px-6 py-32 flex flex-col items-center text-center gap-10">

        {{-- HUGE LOGO --}}
        <div class="relative group">
            <div class="absolute inset-0 bg-red-500 opacity-20 blur-[80px] group-hover:opacity-40 transition"></div>

            <img
                src="{{ asset('assets/images/car_logo.png') }}"
                alt="Elite Auto Japan Logo"
                class="relative w-[220px] md:w-[320px] lg:w-[400px]
                       rounded-2xl md:rounded-3xl
                       bg-white p-3
                       drop-shadow-[0_20px_60px_rgba(0,0,0,0.8)]
                       transition duration-700 group-hover:scale-105"
            >
        </div>

        {{-- BRAND NAME --}}
        <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight leading-none">
            ELITE AUTO JAPAN
        </h1>

        {{-- TAGLINE --}}
        <p class="text-red-500 text-lg md:text-xl tracking-[0.4em] uppercase">
            Precision • Performance • Prestige
        </p>

        {{-- DESCRIPTION --}}
        <p class="text-gray-400 max-w-2xl text-base md:text-lg leading-relaxed">
            A curated collection of elite vehicles imported directly from Japan.
            Every machine is selected for its engineering excellence, performance pedigree, and timeless design.
        </p>

        {{-- CTA --}}
        <a href="{{ route('car.search') }}">
            <button class="mt-6 px-10 py-4 bg-white text-black font-semibold rounded-md tracking-wider
                           hover:bg-red-600 hover:text-white transition duration-300
                           shadow-[0_10px_40px_rgba(255,0,0,0.2)]">
                Explore Inventory
            </button>
        </a>

    </div>

</section>
