<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Roles') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('admin.roles.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Crear nuevo rol
            </a>

            <table class="table-auto w-full border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Permisos</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $role->name }}</td>
                            <td class="px-4 py-2">
                                @foreach ($role->permissions as $permission)
                                    <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded mr-1 mb-1">
                                        {{ $permission->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.roles.edit', $role) }}" class="text-yellow-600 hover:underline mr-2">Editar</a>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar este rol?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>