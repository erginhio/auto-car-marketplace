<div class="hidden md:flex z-10">
    <ul class="flex items-center space-x-4">

        @auth
            {{-- ✅ ADD NEW CAR (ONLY AUTH) --}}
            <li>
                <a href="{{ route('car.create') }}" class="text-gray-800 hover:text-gray-600">
                    <x-button title="Add new car"
                              customClass="duration-500 flex gap-2 items-center w-full py-3 px-6 text-sm tracking-wider border-main-600 border-2 font-semibold text-main-600 hover:bg-main-600 hover:text-white rounded-full transition-transform transform hover:scale-105">
                        <x-slot:leftIcon>
                            <svg data-lucide="circle-plus" class="w-6 h-6"></svg>
                        </x-slot:leftIcon>
                    </x-button>
                </a>
            </li>

            {{-- ✅ MY ACCOUNT (ONLY AUTH) --}}
            <li>
                <x-dropdown>
                    My account
                    <svg data-lucide="chevron-down" class="w-6 h-6"></svg>

                    <x-slot:dropdownContent>
                        <ul class="py-2 text-sm text-gray-700">
                            @foreach ($myAccountData as $item => $value)
                                <li>
                                    <a href="{{ route($value) }}"
                                       class="block px-4 py-2 hover:bg-gray-100">
                                        {{ $item }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </x-slot:dropdownContent>
                </x-dropdown>
            </li>
        @endauth


        {{-- ✅ GUEST ONLY --}}
        @guest
            <li>
                <a href="{{ route('register') }}">
                    <x-button title="Register"
                              class="rounded-full py-3 px-6 flex gap-2 items-center">
                        <x-slot:leftIcon>
                            <svg data-lucide="user-plus" class="w-5 h-5"></svg>
                        </x-slot:leftIcon>
                    </x-button>
                </a>
            </li>

            <li>
                <a href="{{ route('login') }}">
                    <x-button title="Login"
                              customClass="bg-white flex gap-2 items-center hover:text-main-700">
                        <x-slot:leftIcon>
                            <svg data-lucide="log-out" class="w-5 h-5"></svg>
                        </x-slot:leftIcon>
                    </x-button>
                </a>
            </li>
        @endguest


        {{-- ✅ USER DROPDOWN --}}
        @auth
            <li>
                <x-dropdown id="userDropdown" :default="false">

                    <x-button :title="Illuminate\Support\Str::limit(ucwords(Auth::user()->name), 20, '...')"
                              class="rounded-full py-3 px-6 flex gap-2 items-center">

                        <x-slot:leftIcon>
                            <svg data-lucide="user-circle" class="w-5 h-5"></svg>
                        </x-slot:leftIcon>

                        <x-slot:rightIcon>
                            <svg data-lucide="chevron-down" class="w-6 h-6"></svg>
                        </x-slot:rightIcon>

                    </x-button>

                    <x-slot:dropdownContent>
                        <p class="text-sm px-4 py-2 truncate">
                            {{ ucfirst(Auth::user()->email) }}
                        </p>
                        <hr>

                        <ul class="py-2 text-sm text-gray-700">

                            <li>
                                <button class="flex px-4 py-2 gap-2 hover:bg-gray-100 w-full">
                                    <svg data-lucide="circle-user" class="w-4 h-4"></svg>
                                    Profile
                                </button>
                            </li>

                            <li>
                                <button class="flex px-4 py-2 gap-2 hover:bg-gray-100 w-full">
                                    <svg data-lucide="settings" class="w-4 h-4"></svg>
                                    Settings
                                </button>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="flex px-4 py-2 gap-2 hover:bg-gray-100 w-full">
                                        <svg data-lucide="log-out" class="w-4 h-4"></svg>
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </x-slot:dropdownContent>

                </x-dropdown>
            </li>
        @endauth

    </ul>
</div>
