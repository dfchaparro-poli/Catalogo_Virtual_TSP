<x-app-layout>
  <x-slot name="header">
    <h2>Crear Producto</h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto">
      <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="card p-6 shadow" autocomplete="off">
        @csrf

        <div class="mb-4">
          <label class="form-label">Nombre</label>
          <input name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-4">
          <label class="form-label">Descripción</label>
          <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
          <label class="form-label">Precio</label>
          <input name="price" type="number" step="0.01" value="{{ old('price') }}" class="form-control" required>
        </div>

        <div class="mb-4">
          <label class="form-label">Stock</label>
          <input name="stock" type="number" value="{{ old('stock') }}" class="form-control" required>
        </div>

        <div class="mb-4">
          <label class="form-label">Imagen</label>
          <input name="image" type="file" accept="image/*" class="form-control">
        </div>

        <div class="d-flex justify-content-end">
          <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Cancelar</a>
          <button class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
