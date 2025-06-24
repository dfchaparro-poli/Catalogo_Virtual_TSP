<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700">Nombre del Rol</label>
                        <input type="text" name="name" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Permisos</label>
                        @foreach ($permissions as $permission)
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-checkbox">
                                    <span class="ml-2">{{ $permission->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex space-x-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear</button>
                        <a href="{{ route('admin.roles.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>