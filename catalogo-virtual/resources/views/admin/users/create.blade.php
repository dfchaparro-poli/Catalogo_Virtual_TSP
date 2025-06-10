<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Aquí va el formulario -->
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Nombre</label>
                        <input type="text" name="name" class="form-input w-full" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Correo Electrónico</label>
                        <input type="email" name="email" class="form-input w-full" required>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Contraseña</label>
                        <input type="password" name="password" class="form-input w-full" required>
                    </div>

                    <!-- Rol (opcional) -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Rol</label>
                        <select name="role" class="form-select w-full">
                            <option value="">Seleccionar Rol</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Crear
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>