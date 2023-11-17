<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="flex flex-col items-center mt-4">
            <a href="/login/github" class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center space-x-2 mb-2">
                <i class="fab fa-github"></i>&nbsp;&nbsp;
                <span>Login With GitHub</span>
            </a>
            <a href="/login/facebook" class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center space-x-2 mt-2">
                <i class="fa-brands fa-facebook-f"></i>&nbsp;&nbsp;
                <span>Login With Facebook</span>
            </a>
            <a href="/login/google" class="bg-red-600 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg flex items-center space-x-2 mt-2">
                <i class="fa-brands fa-google"></i></i>&nbsp;&nbsp;
                <span>Login With Google</span>
            </a>
        </div>

    </form>
</x-guest-layout>