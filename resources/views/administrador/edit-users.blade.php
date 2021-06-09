<x-app-layout>

    <form method="post" action="{{ route('actualizarUsuario', $users->id) }}">

        @csrf
        @method('put')
        <div>
            <x-jet-label for="name" value="{{ __('Nombre') }}"/>
            <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ isset($users->name)? $users->name : ''}}  " required autofocus autocomplete="name">
        </div>

        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Contraseña') }}"/>
            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                         autocomplete="new-password"/>
        </div>

        <div class="mt-4">
            <x-jet-label for="rol" value="{{ __('Tipo de usuario') }}" />
            <select name="role" class="form-control">
                <option disabled selected value>Seleccione tipo de usuario</option>
                <option value="1">Administrador</option>
                <option value="2">Cliente</option>
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
                {{ __('Guardar') }}
            </x-jet-button>
        </div>
    </form>
</x-app-layout>
