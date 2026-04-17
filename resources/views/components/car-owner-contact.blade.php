@props(['phone' => ''])

@php
    $cleanPhone = preg_replace('/[^0-9]/', '', $phone); // for WhatsApp link
@endphp

<div
    class="flex items-center justify-between max-w-[600px] px-5 py-4 rounded-2xl bg-white shadow-md hover:shadow-xl transition duration-300 border border-gray-100">

    <!-- Left: Icon + Text -->
    <div class="flex items-center gap-3">
        <!-- WhatsApp Icon -->
        <div class="bg-green-100 p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="currentColor"
                 viewBox="0 0 24 24">
                <path
                    d="M20.52 3.48A11.91 11.91 0 0012.06 0C5.47 0 .11 5.36.11 11.94c0 2.1.55 4.14 1.6 5.95L0 24l6.27-1.64a11.93 11.93 0 005.79 1.47h.01c6.59 0 11.95-5.36 11.95-11.94 0-3.19-1.24-6.19-3.5-8.41zM12.07 21.5a9.5 9.5 0 01-4.83-1.32l-.35-.21-3.72.97.99-3.63-.23-.37a9.47 9.47 0 01-1.47-5.03c0-5.25 4.27-9.5 9.52-9.5 2.54 0 4.92.99 6.72 2.79a9.43 9.43 0 012.8 6.71c0 5.25-4.27 9.5-9.52 9.5zm5.23-7.13c-.29-.15-1.7-.84-1.96-.94-.26-.1-.45-.15-.64.15-.19.29-.74.94-.91 1.13-.17.19-.33.21-.62.07-.29-.15-1.23-.45-2.35-1.44-.87-.78-1.45-1.75-1.62-2.04-.17-.29-.02-.45.13-.6.13-.13.29-.33.43-.5.14-.17.19-.29.29-.48.1-.19.05-.36-.02-.5-.07-.15-.64-1.54-.88-2.11-.23-.55-.47-.48-.64-.49h-.55c-.19 0-.5.07-.76.36-.26.29-1 1-1 2.44s1.02 2.83 1.16 3.02c.14.19 2.01 3.07 4.87 4.3.68.29 1.2.46 1.61.59.68.21 1.3.18 1.79.11.55-.08 1.7-.7 1.94-1.38.24-.68.24-1.27.17-1.38-.07-.11-.26-.18-.55-.33z" />
            </svg>
        </div>

        <!-- Text -->
        <div>
            <p class="text-sm text-gray-500">Contact via WhatsApp only</p>
            <p class="font-semibold text-gray-800">{{ $phone }}</p>
        </div>
    </div>

    <!-- Button -->
    <a href="https://wa.me/{{ $cleanPhone }}"
       target="_blank"
       class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-full transition duration-300 flex items-center gap-2">
        Chat
        <svg data-lucide="arrow-right" class="w-4 h-4"></svg>
    </a>
</div>
