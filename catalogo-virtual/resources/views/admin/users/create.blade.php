{{-- resources/views/admin/users/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Usuario
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- Card para el formulario --}}
            <div class="card shadow-sm">
                <div class="card-header">
                    <span class="h5 mb-0">Nuevo Usuario</span>
                </div>
                <div class="card-body p-6">
                    {{-- Mostrar validaciones --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        {{-- Nombre --}}
                        <div class="mb-4">
                            <label class="form-label">Nombre</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control"
                                required
                            >
                        </div>

                        {{-- Email --}}
                        <div class="mb-4">
                            <label class="form-label">Correo Electrónico</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control"
                                required
                            >
                        </div>

                        {{-- Contraseña --}}
                        <div class="mb-4">
                            <label class="form-label">Contraseña</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >
                        </div>

                        {{-- Rol --}}
                        <div class="mb-4">
                            <label class="form-label">Rol</label>
                            <select name="role" class="form-select">
                                <option value="" disabled selected>Seleccionar Rol</option>
                                @foreach($roles as $role)
                                    <option
                                        value="{{ $role->name }}"
                                        @selected(old('role') === $role->name)
                                    >
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-2">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Crear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- /Card --}}
        </div>
    </div>
</x-app-layout>
