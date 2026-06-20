<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RepairController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('home.index'))->name('home');

Route::get('/products',        [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

/*
|--------------------------------------------------------------------------
| Authenticated Customer Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Cart
    Route::get('/cart',                    [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add',               [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{cartItem}',       [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cartItem}',      [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart',                 [CartController::class, 'clear'])->name('cart.clear');

    // Checkout
    Route::get('/checkout',  [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Orders
    Route::get('/orders',                  [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}',          [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

    // Repairs
    Route::get('/repairs',                 [RepairController::class, 'index'])->name('repairs.index');
    Route::get('/repairs/create',          [RepairController::class, 'create'])->name('repairs.create');
    Route::post('/repairs',                [RepairController::class, 'store'])->name('repairs.store');
    Route::get('/repairs/{repair}',        [RepairController::class, 'show'])->name('repairs.show');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        // Products
        Route::resource('products', Admin\ProductController::class);

        // Orders
        Route::get('orders',                        [Admin\OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}',                [Admin\OrderController::class, 'show'])->name('orders.show');
        Route::patch('orders/{order}/status',       [Admin\OrderController::class, 'updateStatus'])->name('orders.status');

        // Repairs
        Route::get('repairs',                       [Admin\RepairController::class, 'index'])->name('repairs.index');
        Route::get('repairs/{repair}',              [Admin\RepairController::class, 'show'])->name('repairs.show');
        Route::patch('repairs/{repair}',            [Admin\RepairController::class, 'update'])->name('repairs.update');

        // Customers
        Route::get('customers', fn () => view('admin.customers.index', [
            'customers' => \App\Models\User::where('role', 'customer')->latest()->paginate(20),
        ]))->name('customers.index');
    });

/*
|--------------------------------------------------------------------------
| M-Pesa Callback (No CSRF / Auth)
|--------------------------------------------------------------------------
*/
Route::post('/api/mpesa/callback', [PaymentController::class, 'mpesaCallback'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
