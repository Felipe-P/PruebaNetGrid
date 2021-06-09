<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-jet-label for="email" value="{{ __('Correo') }}"/>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="old('email')"
                                     required autofocus/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Contraseña') }}"/>
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                     required
                                     autocomplete="current-password"/>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember"/>
                            <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Iniciar sesion') }}
                        </x-jet-button>
                    </div>
                </form>
                @endauth
                </div>
            @endif
    </x-jet-authentication-card>
</x-guest-layout>
