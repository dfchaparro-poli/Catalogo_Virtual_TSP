<x-app-layout>
    <x-slot name="header">
        <h2>Compra #{{ $order->id }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- Mensaje de éxito --}}
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white shadow sm:rounded-lg p-6">

                <p><strong>Fecha:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                <p><strong>Total:</strong> ${{ number_format($order->total, 0, ',', '.') }}</p>

                {{-- Medio de pago, si existe --}}
                @if($order->payment_method)
                    <p>
                        <strong>Medio de Pago:</strong>
                        @switch($order->payment_method)
                            @case('credit_card')     Tarjeta de Crédito @break
                            @case('debit_card')      Tarjeta de Débito  @break
                            @case('cash')            Efectivo           @break
                            @case('bank_transfer')   Transferencia Bancaria @break
                            @default                 {{ $order->payment_method }}
                        @endswitch
                    </p>
                @endif

                <hr class="my-4">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>${{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-4">
                    Volver a Mis Compras
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
