<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Rol') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nombre del rol -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Nombre del Rol</label>
                    <input type="text" name="name" value="{{ old('name', $role->name) }}"
                        class="form-input w-full mt-1" required>
                </div>

                <!-- Permisos -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700 mb-2">Permisos</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach ($permissions as $permission)
                            <label class="flex items-center">
                                <input type="checkbox" name="permissions[]"
                                    value="{{ $permission->name }}"
                                    class="form-checkbox"
                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm">{{ $permission->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                
                <!-- Botones -->
                <div class="flex justify-start space-x-3">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Actualizar
                    </button>
                    <a href="{{ route('admin.roles.index') }}" class="text-gray-600 hover:underline">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>