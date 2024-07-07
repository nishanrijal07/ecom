<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Root route
Route::get('/', [HomeController::class, 'home'])->name('home');

// Dashboard route
// Route::get('/dashboard', [HomeController::class, 'home'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('myorders', [HomeController::class, 'home'])->name('myorders');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('admin-dashboard', [HomeController::class, 'index'])->name('admin-dashboard');

    Route::get('view_category', [AdminController::class, 'view_category'])->name('view.category');
    Route::post('add_category', [AdminController::class, 'add_category'])->name('add.category');
    Route::delete('delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete.category');
    Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->name('edit.category');
    Route::post('update_category/{id}', [AdminController::class, 'update_category'])->name('update.category');

    Route::get('add_product', [AdminController::class, 'add_product'])->name('add.product');
    Route::post('upload_product', [AdminController::class, 'upload_product'])->name('upload.product');
    Route::get('view_product', [AdminController::class, 'view_product'])->name('view.product');
    Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete.product');
    Route::get('update_product/{id}', [AdminController::class, 'update_product'])->name('update.product');
    Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit.product');
    Route::get('product_search', [AdminController::class, 'product_search'])->name('product.search');

    Route::get('view_order', [AdminController::class, 'view_order'])->name('view.order');
    Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->name('on.the.way');
    Route::get('delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');
});

// Routes for HomeController
Route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');

// Routes requiring authentication
Route::middleware('auth')->group(function () {
    Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
    Route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->name('delete_cart');
    Route::get('mycart', [HomeController::class, 'mycart'])->name('mycart');
    Route::post('confirm_order', [HomeController::class, 'confirm_order'])->name('confirm_order');
});

Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('why', [HomeController::class, 'why'])->name('why');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
