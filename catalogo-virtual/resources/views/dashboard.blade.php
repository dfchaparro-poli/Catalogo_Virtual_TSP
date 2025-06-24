<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Panel para ADMIN -->
            @role('admin')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-2">Panel de Administrador</h3>
                        <p>Accede a la gestión de usuarios y roles.</p>

                        @can('create users')
                            <a href="{{ route('admin.users.create') }}"
                               class="inline-block mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                Crear Usuario
                            </a>
                        @endcan

                        @can('create roles')
                            <a href="{{ route('admin.roles.create') }}"
                               class="inline-block mt-4 bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded ml-2">
                                Crear Rol
                            </a>
                        @endcan
                    </div>
                </div>
            @endrole

            <!-- Panel para USER -->
            @role('user')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-2">Panel de Usuario</h3>
                        <p>Bienvenido, puedes acceder a tus funciones personales aquí.</p>
                    </div>
                </div>
            @endrole

        </div>
    </div>
</x-app-layout>