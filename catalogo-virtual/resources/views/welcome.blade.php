<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Eleven</title>

    <!-- Bootstrap 5 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tu CSS extra, si tienes -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }

        .hero {
            padding: 6rem 0;
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
        }
    </style>
</head>

<body>
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Eleven</a>
            <div class="ms-auto">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary btn-sm me-2">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">Iniciar Sesión</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Crear Cuenta</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </nav>

    {{-- HERO --}}
    <section class="hero text-center text-dark">
        <div class="container">
            <h1 class="display-4 fw-bold">Bienvenido a Eleven</h1>
            <p class="lead mb-4">
                Tu catálogo virtual de electrodomésticos con garantía y envíos rápidos.
            </p>
            @guest
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Iniciar Sesión</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Crear Cuenta</a>
            @endif
            @endguest
        </div>
    </section>

    {{-- PRODUCTOS DESTACADOS COMO CARRUSEL --}}
    {{-- PRODUCTOS DESTACADOS EN UNA CARD --}}
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Productos Destacados</h2>

            <div
                id="featuredCarousel"
                class="carousel slide position-relative"
                data-bs-ride="carousel"
                data-bs-interval="4000"
                data-bs-pause="hover">
                {{-- Slides --}}
                <div class="carousel-inner">
                    @foreach([
                    ['name'=>'Nevecon Samsung','img'=>'images/Nevecon.png','price'=>'$7.500.000'],
                    ['name'=>'Lavadora Samsung','img'=>'images/Lavadora Samsung.webp','price'=>'$3.200.000'],
                    ['name'=>'Horno Microondas con Dorador','img'=>'images/Horno Microondas con Dorador.webp','price'=>'$450.000'],
                    ['name'=>'Aspiradora Karcher','img'=>'images/Aspiradora Karcher.png','price'=>'$4.500.000'],
                    ] as $i => $product)
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                        <div class="d-flex justify-content-center">
                            <div class="card shadow-sm" style="width: 18rem;">
                                <img
                                    src="{{ $product['img'] }}"
                                    class="card-img-top"
                                    alt="{{ $product['name'] }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product['name'] }}</h5>
                                    <p class="card-text text-primary fw-bold">{{ $product['price'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Controles fuera de la card --}}
                <button
                    class="btn btn-dark carousel-control-prev"
                    type="button"
                    data-bs-target="#featuredCarousel"
                    data-bs-slide="prev"
                    style="width: 3rem; height: 3rem; top: 50%; left: -1.5rem;">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button
                    class="btn btn-dark carousel-control-next"
                    type="button"
                    data-bs-target="#featuredCarousel"
                    data-bs-slide="next"
                    style="width: 3rem; height: 3rem; top: 50%; right: -1.5rem;">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </section>





    {{-- FOOTER --}}
    <footer class="py-4 bg-white shadow-sm">
        <div class="container text-center text-muted small">
            © {{ date('Y') }} Eleven. Todos los derechos reservados.
        </div>
    </footer>

    <!-- Bootstrap 5 JS bundle (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>