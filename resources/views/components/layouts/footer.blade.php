<footer class="bg-gradient-to-b from-black to-gray-900 py-12 px-4 xl:px-12">
    <div class="max-w-screen-2xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

        {{-- BRAND / ABOUT --}}
        <div>
            <h1 class="text-3xl font-bold mb-4 text-white">Auto Japan Cars</h1>
            <p class="text-gray-300 leading-relaxed">
                Premium selection of reliable Japanese vehicles.
                We bring you quality, performance, and value — all in one place.
            </p>
        </div>

        {{-- QUICK LINKS --}}
        <div class="flex flex-col items-center text-center">
            <h1 class="text-2xl font-semibold mb-4 text-white">Quick Links</h1>

            <ul class="text-gray-300 space-y-2">
                <li>
                    <a href="/" class="hover:text-white transition">Home</a>
                </li>
                <li>
                    <a href="/car/search" class="hover:text-white transition">Browse Cars</a>
                </li>
            </ul>
        </div>

        {{-- WHATSAPP CONTACT --}}
        <div>
            <h1 class="text-2xl font-semibold mb-4 text-white">Contact</h1>

            <p class="text-gray-300 mb-4">
                Looking for your next car? Our team is ready to assist you anytime.
            </p>

            <a href="https://wa.me/1234567890" target="_blank"
               class="inline-flex items-center gap-3 bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-lg transition">

                {{-- WhatsApp Icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.52 3.48A11.8 11.8 0 0012.02 0C5.38 0 .02 5.36.02 12c0 2.12.56 4.19 1.63 6.01L0 24l6.15-1.61A11.94 11.94 0 0012.02 24c6.63 0 12-5.36 12-12 0-3.2-1.25-6.22-3.5-8.52zM12.02 21.82c-1.82 0-3.6-.49-5.15-1.41l-.37-.22-3.65.96.97-3.56-.24-.37a9.8 9.8 0 01-1.5-5.22c0-5.41 4.41-9.82 9.84-9.82 2.63 0 5.1 1.02 6.96 2.89a9.77 9.77 0 012.88 6.93c0 5.41-4.41 9.82-9.84 9.82zm5.44-7.37c-.3-.15-1.77-.87-2.05-.97-.27-.1-.47-.15-.66.15-.2.3-.76.97-.93 1.17-.17.2-.35.22-.65.07-.3-.15-1.27-.47-2.42-1.49-.9-.8-1.5-1.79-1.67-2.09-.17-.3-.02-.46.13-.6.14-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.66-1.6-.9-2.2-.23-.56-.47-.49-.66-.5h-.56c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.49 0 1.47 1.06 2.89 1.21 3.09.15.2 2.09 3.19 5.06 4.47.71.31 1.26.49 1.69.63.71.22 1.36.19 1.87.11.57-.09 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35z"/>
                </svg>

                Start Chat on WhatsApp
            </a>
        </div>

    </div>

    {{-- BOTTOM --}}
    <div class="mt-10 border-t border-gray-700 pt-6 text-center text-gray-400 text-sm">
        © {{ date('Y') }} Auto Japan Cars. All rights reserved.
    </div>
</footer>
