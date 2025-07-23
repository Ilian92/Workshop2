<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;
use App\Http\Controllers\Admin\TypeAnimalController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\PilierController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/products/{produit}/images', [ImageController::class, 'uploadProductImage'])->name('products.images.upload');
    Route::delete('/products/{produit}/images', [ImageController::class, 'deleteProductImage'])->name('products.images.delete');
});

Route::get('/products/{produit}/images', [ImageController::class, 'getProductImages'])->name('products.images.get');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/my-animals', [AnimalController::class, 'index'])->name('animals.index');
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');
    Route::get('/animals/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::put('/animals/{animal}', [AnimalController::class, 'update'])->name('animals.update');
    Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);

    Route::resource('animals', AdminAnimalController::class);

    Route::resource('type-animals', TypeAnimalController::class);

    Route::resource('produits', ProduitController::class);

    Route::resource('piliers', PilierController::class);
});

require __DIR__ . '/auth.php';
