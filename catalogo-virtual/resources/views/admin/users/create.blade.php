{{-- resources/views/admin/users/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Usuario
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <span class="h5 mb-0">Nuevo Usuario</span>
                </div>
                <div class="card-body p-6">
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
                                autocomplete="off">
                        </div>

                        {{-- Email --}}
                        <div class="mb-4">
                            <label class="form-label">Correo Electrónico</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control"
                                required>
                        </div>

                        {{-- Contraseña --}}
                        <div class="mb-4">
                            <label class="form-label">Contraseña</label>
                            <div class="input-group">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    required>
                                <span class="input-group-text" style="cursor: pointer;"
                                    onclick="togglePassword('password', this)">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        {{-- Confirmar Contraseña --}}
                        <div class="mb-4">
                            <label class="form-label">Confirmar Contraseña</label>
                            <div class="input-group">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control"
                                    required>
                                <span class="input-group-text" style="cursor: pointer;"
                                    onclick="togglePassword('password_confirmation', this)">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        {{-- Rol --}}
                        <div class="mb-4">
                            <label class="form-label">Rol</label>
                            <select
                                name="roles[]" {{-- ← aquí va roles[] --}}
                                class="form-select"
                                required>
                                <option value="" disabled selected>Seleccionar Rol</option>
                                @foreach($roles as $role)
                                <option
                                    value="{{ $role->name }}"
                                    @selected( in_array($role->name, old('roles', [])) )
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
        </div>
    </div>
</x-app-layout>

<script>
    function togglePassword(fieldId, iconSpan) {
        const input = document.getElementById(fieldId);
        const icon = iconSpan.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>