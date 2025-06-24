<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing + redirección
Route::get('/', function () {
    if (! Auth::check()) return view('welcome');
    $user = Auth::user();
    /** @var \App\Models\User $user */
    if ($user->hasRole('admin'))   return redirect()->route('admin.dashboard');
    if ($user->hasRole('user'))    return redirect()->route('user.dashboard');
    return redirect()->route('dashboard');
});

// /home opcional
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas que requieren auth+verified
Route::middleware(['auth', 'verified'])->group(function () {

    // 1) dashboard general con HomeController@index
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // 2) dashboard rol “user”
    Route::middleware('role:user')
        ->prefix('user')->name('user.')
        ->group(fn() => Route::get('/', fn() => view('user.dashboard'))->name('dashboard'));

    // 3) rutas públicas de producto/​carrito para “customer”
    Route::middleware('role:customer')->group(function () {
        // Detalle producto (público)
        Route::get('/products/{product}', [ProductController::class, 'show'])
            ->name('products.show');
        // Agregar al carrito
        Route::post('/cart/add/{product}', [CartController::class, 'add'])
            ->name('cart.add');
        // Ver carrito
        Route::get('/cart', [CartController::class, 'index'])
            ->name('cart.index');

        Route::patch('cart/{item}', [CartController::class, 'update'])
            ->name('cart.update');

        Route::delete('cart/{item}', [CartController::class, 'remove'])
            ->name('cart.remove');

        Route::post('cart/checkout', [OrderController::class, 'store'])
            ->name('orders.store');

        Route::get('orders', [OrderController::class, 'index'])
            ->name('orders.index');

        Route::get('orders/{order}', [OrderController::class, 'show'])
            ->name('orders.show');
        // Catálogo público con filtros (búsqueda básica/avanzada)
        Route::get('/products', [ProductController::class, 'index'])
            ->name('products.index');

    });

    // 4) rutas de admin (usuarios, roles, productos)
    Route::middleware('role:admin')
        ->prefix('admin')->name('admin.')
        ->group(function () {
            // dashboard admin
            Route::get('/', fn() => view('admin.dashboard'))->name('dashboard');
            Route::resource('users', UserController::class);
            Route::resource('roles', RoleController::class);
            Route::resource('products', ProductController::class);
        });
});
