<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="flex min-h-full flex-col justify-center px-6 py-5 ">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-6xl font-bold tracking-tight text-gray-900">INICIAR SECCION</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <div>
            <label for="email" :value="__('Email')" class="block text-sm font-medium leading-6 text-gray-900"> Email </label>
            <div class="mt-2">
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="flex items-center justify-between mb-2 mt-5">
            <label for="password" :value="__('Password')"> Contraseña </label>
        </div>
            <div class="mb-2">
            <input id="password" type="password" name="password"
            required autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="text-sm text-right pt-3">
            @if (Route::has('password.request'))
            <a class="font-semibold text-gray-600 hover:underline" href="{{ route('password.request') }}">
                {{ __('Olvidastes tu Contraseña?') }}
                </a>
            @endif

        <div>
            <x-primary-button class="flex w-full justify-center rounded-md bg-gray-700 px-3 mt-5 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black ">
                {{ __('Acceder') }}
            </x-primary-button>
        </div>

        </div>
    </form>
</x-guest-layout>
