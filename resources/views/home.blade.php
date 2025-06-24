{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    {{-- Slot para el encabezado --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Contenido principal --}}
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card shadow-sm">
                {{-- Cabecera de la card --}}
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>
                {{-- Cuerpo de la card --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
