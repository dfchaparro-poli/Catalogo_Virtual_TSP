{{-- resources/views/cart/index.blade.php --}}
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

        {{-- Mensaje de éxito --}}
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif

        <table class="table">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Precio unitario</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
            <tr>
              <td>{{ $item->product->name }}</td>
              <td>$ {{ number_format($item->price,0,',','.') }}</td>
              <td style="width:120px;">
                <form method="POST" action="{{ route('cart.update', $item) }}" class="d-flex">
                  @csrf
                  @method('PATCH')
                  <input
                    type="number"
                    name="quantity"
                    value="{{ $item->quantity }}"
                    min="1"
                    max="{{ $item->product->stock }}"
                    class="form-control form-control-sm me-2">
                  <button class="btn btn-sm btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                      <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z" />
                      <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z" />
                    </svg>
                  </button>
                </form>
              </td>
              <td>
                $ {{ number_format($item->price * $item->quantity,0,',','.') }}
              </td>
              <td style="width:50px;">
                <form method="POST" action="{{ route('cart.remove', $item) }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="text-end fw-bold">
          Total: $ {{ number_format($items->sum(fn($i)=>$i->price*$i->quantity),0,',','.') }}
        </div>

        <form method="POST" action="{{ route('orders.store') }}">
          @csrf
          <button type="submit" class="btn btn-success">
            Confirmar compra
          </button>
        </form>

        @endif

      </div>
    </div>
  </div>
</x-app-layout>