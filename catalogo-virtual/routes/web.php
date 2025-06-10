<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas protegidas con autenticación y verificación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Ruta general de dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas exclusivas para ADMIN
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        // Dashboard de administrador
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Gestión de usuarios (admin/users/*)
        Route::resource('users', UserController::class);

        // Gestión de roles (admin/roles/*)
        Route::resource('roles', RoleController::class);
    });

    // Rutas exclusivas para USER
    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/', function () {
            return view('user.dashboard');
        })->name('dashboard');
    });
});
