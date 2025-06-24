<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Hola, {{ Auth::user()->name }}</h3>

                <p class="mb-4">
                    Tu rol actual es: 
                    <strong>{{ implode(', ', Auth::user()->getRoleNames()->toArray()) }}</strong>
                </p>

                <div class="mt-4">
                    <h4 class="font-semibold">Acciones disponibles:</h4>
                    <ul class="list-disc pl-5 mt-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">
                                Gestionar usuarios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.roles.index') }}" class="text-blue-600 hover:underline">
                                Gestionar roles
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>