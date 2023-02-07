<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// RUTAS PARA USUARIOS
Route::get('/users', [UserController::class, 'index'])->middleware(['auth', 'verified', 'RolAdmin'])->name('users.index');

// RUTAS PARA PRODUCTOS
Route::get('/productos', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('productos.index');
Route::get('/productos/{product}/edit', [ProductController::class, 'edit'])->middleware(['auth', 'verified', 'RolAdmin'])->name('products.edit');
Route::get('/productos/crear', [ProductController::class, 'create'])->middleware(['auth', 'verified', 'RolAdmin'])->name('products.create');

// RUTA PARA PAGO
Route::get('/facturas', [PaymentController::class, 'index'])->middleware(['auth', 'verified', 'RolAdmin'])->name('payment.index');
Route::get('/facturas/{payment}', [PaymentController::class, 'show'])->name('payment.show');
Route::post('pay', [PaymentController::class, 'pay'])->name('payment');
Route::get('success/{product:id}', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);

// RUTAS PARA COMPRAS
Route::get('/compras', [CompraController::class, 'index'])->middleware(['auth', 'verified'])->name('compras.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
