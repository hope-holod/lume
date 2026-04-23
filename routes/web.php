<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductAdminController;


Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/', [HomeController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


// Личный кабинет
Route::middleware('auth')->group(function () {

    // Профиль Breeze (оставляем)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Наш личный кабинет
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::delete('/account/delete', [AccountController::class, 'destroy'])->name('account.delete');



Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product_id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cart_id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{cart_id}', [CartController::class, 'remove'])->name('cart.remove');
});

});

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
});
Route::get('/checkout/success', [CheckoutController::class, 'success'])
    ->name('checkout.success');
Route::middleware('auth')->group(function () {
    Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders');
});

Route::middleware('auth')->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/favorites/toggle/{productId}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
});



Route::post('/admin/product/update/{id}', [ProductAdminController::class, 'update'])->name('admin.product.update');
Route::post('/admin/product/delete/{id}', [ProductAdminController::class, 'delete'])->name('admin.product.delete');
Route::post('/admin/product/create', [ProductAdminController::class, 'create'])->name('admin.product.create');


require __DIR__.'/auth.php';


