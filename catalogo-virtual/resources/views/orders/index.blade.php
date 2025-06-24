<x-app-layout>
    <x-slot name="header">
        <h2>Mis Compras</h2>
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
                @if($orders->isEmpty())
                <p>No tienes compras todavía.</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Ítems</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $order->items_count }}</td>
                            <td>${{ number_format($order->total,0,',','.') }}</td>
                            <td>
                                <a href="{{ route('orders.show',$order) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    Detalle
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>