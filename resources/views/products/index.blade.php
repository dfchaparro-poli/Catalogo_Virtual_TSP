<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Gestión de Productos</h2>
    </x-slot>

    <div class="container py-4">
        {{-- Formulario de Búsqueda --}}
        <form method="GET" action="{{ route('admin.products.index') }}" class="mb-4">
            <div class="row g-2">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ request('name') }}">
                </div>
                <div class="col-md-2">
                    <input type="number" name="price_min" class="form-control" placeholder="Precio mínimo" step="0.01" value="{{ request('price_min') }}">
                </div>
                <div class="col-md-2">
                    <input type="number" name="price_max" class="form-control" placeholder="Precio máximo" step="0.01" value="{{ request('price_max') }}">
                </div>
                <div class="col-md-2">
                    <input type="number" name="stock_min" class="form-control" placeholder="Stock mínimo" value="{{ request('stock_min') }}">
                </div>
                <div class="col-md-3 d-grid">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>
            <div class="row g-2 mt-2">
                <div class="col-md-3">
                    <select name="order_by" class="form-select">
                        <option value="">Ordenar por...</option>
                        <option value="name" {{ request('order_by') == 'name' ? 'selected' : '' }}>Nombre</option>
                        <option value="price" {{ request('order_by') == 'price' ? 'selected' : '' }}>Precio</option>
                        <option value="stock" {{ request('order_by') == 'stock' ? 'selected' : '' }}>Stock</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="order_dir" class="form-select">
                        <option value="asc" {{ request('order_dir') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                        <option value="desc" {{ request('order_dir') == 'desc' ? 'selected' : '' }}>Descendente</option>
                    </select>
                </div>
            </div>
        </form>

        {{-- Tabla de productos --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-info">Ver</a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No se encontraron productos con los criterios ingresados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
