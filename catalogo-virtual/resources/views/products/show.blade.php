{{-- resources/views/products/show.blade.php --}}
<x-app-layout>
  <x-slot name="header"><h2>{{ $product->name }}</h2></x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto">
      <div class="bg-white shadow sm:rounded-lg p-6">
        <img src="{{ asset('storage/'.$product->image) }}"
             class="mb-4 w-full object-cover" alt="{{ $product->name }}">

        <p class="mb-4">{{ $product->description }}</p>
        <p class="mb-2"><strong>Stock:</strong> {{ $product->stock }}</p>
        <p class="text-primary fw-bold mb-4">
          ${{ number_format($product->price,0,',','.') }}
        </p>

        <form action="{{ route('cart.add',$product) }}" method="POST" class="w-50">
          @csrf
          <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input type="number"
                   name="quantity"
                   class="form-control"
                   min="1"
                   max="{{ $product->stock }}"
                   value="1"
                   required
            >
          </div>
          <button type="submit" class="btn btn-success">
            Agregar al carrito
          </button>
          <a href="{{ route('dashboard') }}" class="btn btn-secondary ms-2">
            Volver
          </a>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
