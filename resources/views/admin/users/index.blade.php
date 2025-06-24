<x-app-layout>
    {{-- Título de la página --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de Usuarios
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Admin</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Usuarios
                    </li>
                </ol>
            </nav>
            {{-- Card principal --}}
            <div class="card shadow-sm">
                {{-- Encabezado de la card --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="h5 mb-0">Usuarios registrados</span>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle"></i> Crear usuario
                    </a>
                </div>

                {{-- Cuerpo de la card --}}
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                    <td class="text-nowrap text-center">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user) }}"
                                            method="POST"
                                            class="d-inline-block"
                                            onsubmit="return confirm('¿Eliminar este usuario?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- /Card --}}
        </div>
    </div>
</x-app-layout>