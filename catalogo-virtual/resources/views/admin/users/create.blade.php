<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Nombre</label>
                        <input type="text" name="name" class="form-input w-full" value="{{ old('name') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Correo Electrónico</label>
                        <input type="email" name="email" class="form-input w-full" value="{{ old('email') }}" required>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Contraseña</label>
                        <input type="password" name="password" class="form-input w-full" required>
                    </div>

                    <!-- Confirmación de Contraseña -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-input w-full" required>
                    </div>

                    <!-- Rol -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Rol</label>
                        <select name="roles[]" class="form-select w-full" required>
                            <option value="">Seleccionar Rol</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Crear</button>
                    <a href="{{ route('admin.users.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>