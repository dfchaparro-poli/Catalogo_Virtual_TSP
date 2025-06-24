{{-- resources/views/admin/products/show.blade.php --}}
<x-app-layout>
  <x-slot name="header"><h2>Editar Producto</h2></x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto">

      {{-- FORMULARIO DE ACTUALIZAR --}}
      <form
        action="{{ route('admin.products.update', $product) }}"
        method="POST"
        enctype="multipart/form-data"
        class="card p-6 shadow mb-4"
      >
        @csrf @method('PUT')

        {{-- Nombre --}}
        <div class="mb-4">
          <label class="form-label">Nombre</label>
          <input
            name="name"
            value="{{ old('name',$product->name) }}"
            class="form-control"
            required
            autocomplete="off"
          >
        </div>

        {{-- Descripción --}}
        <div class="mb-4">
          <label class="form-label">Descripción</label>
          <textarea
            name="description"
            class="form-control"
            rows="4"
            required
          >{{ old('description',$product->description) }}</textarea>
        </div>

        {{-- Precio --}}
        <div class="mb-4">
          <label class="form-label">Precio</label>
          <input
            name="price"
            type="number"
            step="0.01"
            value="{{ old('price',$product->price) }}"
            class="form-control"
            required
          >
        </div>

        {{-- Stock --}}
        <div class="mb-4">
          <label class="form-label">Stock</label>
          <input
            name="stock"
            type="number"
            value="{{ old('stock',$product->stock) }}"
            class="form-control"
            required
          >
        </div>

        {{-- Imagen --}}
        <div class="mb-4">
          <label class="form-label">Imagen actual</label><br>
          @if($product->image)
            <img
              src="{{ asset('storage/'.$product->image) }}"
              class="img-fluid mb-2"
              style="max-width:150px"
            >
          @endif

          <label class="form-label">Cambiar Imagen</label>
          <input
            name="image"
            type="file"
            accept="image/*"
            class="form-control"
          >
        </div>

        <div class="d-flex justify-content-end">
          {{-- Botón Cancelar hacia /dashboard --}}
          <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">
            Cancelar
          </a>
          <button class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>

      {{-- FORMULARIO DE ELIMINAR --}}
      <form
        action="{{ route('admin.products.destroy', $product) }}"
        method="POST"
        onsubmit="return confirm('¿Está seguro de eliminar este producto?');"
      >
        @csrf @method('DELETE')
        <button class="btn btn-danger w-100">
          Eliminar Producto
        </button>
      </form>

    </div>
  </div>
</x-app-layout>
