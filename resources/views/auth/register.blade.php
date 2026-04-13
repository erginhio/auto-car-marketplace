<x-base-layout title="Register">
    {{-- auth layout form --}}
    <x-auth-layout title="Getting Started with Us">
        {{-- form content --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="space-y-6">
                {{-- form fields --}}
                <x-input-field name="name" placeholder="Enter name" :value="old('name')" label="Name" labelClass="font-medium" />
                <x-input-field name="email" placeholder="Enter email" :value="old('email')" label="Email" labelClass="font-medium" />
                <x-input-field name="password" type="password"  placeholder="Enter password" label="Password"
                    labelClass="font-medium" />
                <x-input-field name="confirmPassword"  type="password" placeholder="Enter password"
                    label="Confirm Password" labelClass="font-medium" />
                {{-- check term condition --}}
                <x-check-term />
            </div>
            {{-- Register button --}}
            <div class="!mt-8">
                <x-button type="submit" title="Create an account" />
            </div>
        </form>
        <p class="text-gray-800 text-sm mt-6 text-center">Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline ml-1">
                Login here
            </a>
        </p>
    </x-auth-layout>
</x-base-layout>
