@props(['title'=>'Seyla', 'footerLinks'=>''])
<x-base-layout :$title bodyClass="bg-slate-100 flex flex-col min-h-screen">
            {{-- header --}}
        <x-layouts.header/>

         {{-- content render here --}}
            {{ $slot }}

         {{-- footer --}}

        <x-layouts.footer />
</x-base-layout>
