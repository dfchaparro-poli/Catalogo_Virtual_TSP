<x-app-layout>
  <x-slot name="header">
    <h2>Mi Carrito</h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white shadow sm:rounded-lg p-6">
        @if($items->isEmpty())
          <p>Tu carrito está vacío.</p>
        @else
          <ul class="list-group mb-4">
            @foreach($items as $item)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item->product->name }} x{{ $item->quantity }}
                <span>${{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
              </li>
            @endforeach
          </ul>
          <p class="text-end fw-bold">
            Total: ${{ number_format($items->sum(fn($i) => $i->price * $i->quantity), 0, ',', '.') }}
          </p>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>
