<x-app-layout>
    <x-slot name="header">
        <h2>Confirmar Compra</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- Mensaje de éxito --}}
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="bg-white shadow sm:rounded-lg p-6">

                <h3 class="h5 mb-4">Resumen de tu carrito</h3>

                <table class="table mb-4">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>$ {{ number_format($item->price * $item->quantity,0,',','.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4 class="text-end mb-4">
                    Total: $ {{ number_format($items->sum(fn($i)=> $i->price * $i->quantity),0,',','.') }}
                </h4>

                <form method="POST" action="{{ route('cart.checkout.process') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Medio de Pago</label>
                        <select
                            name="payment_method"
                            id="payment_method"
                            class="form-select"
                            required
                            onchange="onPaymentMethodChange(this.value)">
                            <option value="" disabled selected>Selecciona un método</option>
                            @foreach($methods as $key=>$label)
                            <option value="{{ $key }}" @selected(old('payment_method')==$key)>
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>
                        @error('payment_method')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Datos Tarjeta (crédito/débito) --}}
                    <div id="card_fields" class="mb-4" style="display:none;">
                        <h5>Datos de la Tarjeta</h5>
                        <div class="mb-3">
                            <label class="form-label">Número de Tarjeta</label>
                            <input name="card_number" type="text" class="form-control" placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label">Expiración (MM/AA)</label>
                                <input name="card_expiry" type="text" class="form-control" placeholder="08/25">
                            </div>
                            <div class="col-6">
                                <label class="form-label">CVV</label>
                                <input name="card_cvv" type="text" class="form-control" placeholder="123">
                            </div>
                        </div>
                    </div>

                    {{-- Datos Transferencia --}}
                    <div id="transfer_fields" class="mb-4" style="display:none;">
                        <h5>Datos de Transferencia</h5>
                        <div class="mb-3">
                            <label class="form-label">Banco</label>
                            <input name="bank_name" type="text" class="form-control" placeholder="Ej: Bancolombia">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Número de Cuenta</label>
                            <input name="account_number" type="text" class="form-control" placeholder="1234567890">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a
                            href="{{ route('cart.index') }}"
                            class="btn btn-secondary me-2"
                            onclick="return confirm('¿Cancelar la compra y volver al carrito?');">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-success">
                            Confirmar Compra
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function onPaymentMethodChange(method) {
            // Ocultar ambos secciones
            document.getElementById('card_fields').style.display = 'none';
            document.getElementById('transfer_fields').style.display = 'none';

            // Mostrar según selección
            if (method === 'credit_card' || method === 'debit_card') {
                document.getElementById('card_fields').style.display = 'block';
            } else if (method === 'bank_transfer') {
                document.getElementById('transfer_fields').style.display = 'block';
            }
            // efectivo no muestra nada
        }

        // Al recargar con old value, disparar cambio
        document.addEventListener('DOMContentLoaded', function() {
            const sel = document.getElementById('payment_method');
            if (sel.value) {
                onPaymentMethodChange(sel.value);
            }
        });
    </script>
</x-app-layout>