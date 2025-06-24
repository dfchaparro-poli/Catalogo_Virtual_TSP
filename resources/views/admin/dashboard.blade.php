<x-app-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Panel de Administrador</h1>
    </x-slot>

    <div class="container py-4">
        {{-- Bienvenida --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">¡Bienvenido, Administrador!</h5>
                <p class="card-text text-muted">
                    Aquí puedes gestionar usuarios, roles u otras tareas administrativas.
                </p>
            </div>
        </div>

        {{-- Grid de hasta 4 cards --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            {{-- Roles --}}
            <div class="col">
                <a href="{{ route('admin.roles.index') }}" class="text-decoration-none">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-shield-lock-fill fs-1 text-secondary mb-2"></i>
                            <h5 class="card-title mb-2">Roles</h5>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Users --}}
            <div class="col">
                <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <i class="bi bi-people-fill fs-1 text-secondary mb-2"></i>
                            <h5 class="card-title mb-2">Usuarios</h5>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Espacios vacíos para futuras cards --}}
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
</x-app-layout>
