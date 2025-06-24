<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-end mb-4">
                    <a href="{{ route('admin.users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Crear nuevo usuario
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Nombre</th>
                                <th class="px-4 py-2 border">Correo</th>
                                <th class="px-4 py-2 border">Rol</th>
                                <th class="px-4 py-2 border">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $user->id }}</td>
                                    <td class="px-4 py-2 border">{{ $user->name }}</td>
                                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                                    <td class="px-4 py-2 border">{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-600 hover:underline">Editar</a>

                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar este usuario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline ml-2">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>