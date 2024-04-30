<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FeatureFlagController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


// Route::get('/service/{id}', [SiteController::class, 'index']);

Route::get('/', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');


Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

Route::get('/feature', [FeatureFlagController::class, 'index']);
Route::get('/feature/create', [FeatureFlagController::class, 'create'])->name('feature.create');
Route::post('/feature', [FeatureFlagController::class, 'store'])->name('feature.store');
Route::get('feature/{id}/edit', [FeatureFlagController::class, 'edit'])->name('feature.edit');
Route::put('/feature/{id}', [FeatureFlagController::class, 'update'])->name('feature.update');