<x-base-layout title="Login">
    {{-- auth layout form --}}
    <x-auth-layout title="Welcome Back!">
        {{-- form content --}}
        <form method="POST" action="{{route('login')}}">
            @csrf
            @error('auth')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                    <span class="font-medium">Oops!</span> {{$message}}.
                </div>
            @enderror
            <div class="space-y-6">
                {{-- group fields --}}
                <x-input-field name="email" :value="old('email')" placeholder="Enter email" label="Email" labelClass="font-medium" />
                <x-input-field name="password" type="password" :value="old('password')" placeholder="Enter password" label="Password" labelClass="font-medium" />
                {{-- check term condition --}}
                <x-check-term/>
            </div>
            {{-- Login button --}}
            <div class="!mt-8">
                <x-button type="submit" title="Login" />
            </div>
        </form>

        <p class="text-gray-800 text-sm mt-6 text-center">Don't have an account yet?
            <a href="{{route('register')}}" class="text-blue-600  hover:underline ml-1">
                Register here
            </a>
        </p>
    </x-auth-layout>
</x-base-layout>
