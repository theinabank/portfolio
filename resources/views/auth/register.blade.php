<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
<div class="d-flex justify-content-center align-items-center mt-5">
        <form class="border p-5 bg-dark" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label class="d-block" for="name" :value="__('Name')" />

                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label class="d-block" for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label class="d-block" for="password" :value="__('Password')" />

                <x-input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label class="d-block" for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" type="password" name="password_confirmation" required />
            </div>

            <div>
                <a class="d-block underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
</div>
    </x-auth-card>
</x-guest-layout>
