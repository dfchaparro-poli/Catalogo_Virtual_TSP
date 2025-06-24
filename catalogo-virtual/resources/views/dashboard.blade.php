{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Mensaje de éxito --}}
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            {{-- Aquí abrimos la card principal --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- Sección de Productos --}}
                <h3 class="text-2xl font-semibold mb-6">Productos</h3>

                <div class="row g-4">
                    {{-- Card de “Crear Producto” solo para admin --}}
                    @role('admin')
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="{{ route('admin.products.create') }}" class="text-decoration-none">
                            <div class="card h-100 border-dashed text-center p-4">
                                <div class="display-4 text-gray-400">+</div>
                                <div class="card-body">
                                    <h5 class="card-title">Crear Producto</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endrole

                    {{-- Cards de productos existentes --}}
                    @foreach($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm">
                            @if($product->image)
                            <img
                                src="{{ asset('storage/'.$product->image) }}"
                                class="card-img-top"
                                alt="{{ $product->name }}">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="mb-1">Stock: {{ $product->stock }}</p>
                                <p class="text-primary fw-bold">
                                    ${{ number_format($product->price, 0, ',', '.') }}
                                </p>
                                @role('admin')
                                <a
                                    href="{{ route('admin.products.show', $product) }}"
                                    class="mt-auto btn btn-outline-primary btn-sm">
                                    Ver detalle
                                </a>
                                @elserole('customer')
                                <a
                                    href="{{ route('products.show', $product) }}"
                                    class="mt-auto btn btn-outline-primary btn-sm">
                                    Ver detalle
                                </a>
                                @endrole

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- /row --}}
            </div>
            {{-- /card principal --}}
        </div>
    </div>
</x-app-layout>