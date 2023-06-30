<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('welcome');

// user routes
Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/search', [ProductController::class, 'searchProduct'])->name('search');
Route::get('/about', [GuestController::class, 'about'])->name('about');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/jackets', [ProductTypeController::class, 'jackets'])->name('jackets');
Route::get('/trousers', [ProductTypeController::class, 'trousers'])->name('trousers');
Route::get('/shirts', [ProductTypeController::class, 'shirts'])->name('shirts');

Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
Route::delete('/unsubscribe/{email}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe');
Auth::routes();

// Admin routes
Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/adminsearch', [ProductController::class, 'adminSearch'])->name('products.adminsearch');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/announcement', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::post('/announcement', [AnnouncementController::class, 'store'])->name('announcement.store');
});
