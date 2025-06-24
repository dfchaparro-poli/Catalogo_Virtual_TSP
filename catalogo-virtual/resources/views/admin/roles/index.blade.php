<x-app-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Listado de Roles</h1>
    </x-slot>

    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Admin</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Roles
                </li>
            </ol>
        </nav>
        {{-- Card principal --}}
        <div class="card shadow-sm">
            {{-- Header de la card con botón Crear --}}
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Roles registrados</strong>
                <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-circle"></i> Crear Nuevo Rol
                </a>
            </div>

            <div class="card-body">
                {{-- Mensaje de éxito --}}
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                {{-- Tabla de roles --}}
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form
                                        action="{{ route('admin.roles.destroy', $role) }}"
                                        method="POST"
                                        class="d-inline-block ms-1"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este rol?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-3">
                                    No hay roles registrados.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>