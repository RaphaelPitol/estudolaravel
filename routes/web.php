<?php

use App\Http\Controllers\BattleController;
use App\Http\Controllers\BuscaCepController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FeatureFlagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/service/{id}', [SiteController::class, 'index']);

Route::get('/welcome', function(){
  return view('welcome');
});
Route::get('/', [ClientController::class, 'index'])->name('clients.index')->middleware(['auth']);
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware(['auth']);
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show')->middleware(['auth']);
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit')->middleware(['auth']);
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store')->middleware(['auth']);
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update')->middleware(['auth']);
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy')->middleware(['auth']);


Route::get('/cars', [CarController::class, 'index'])->name('cars.index')->middleware(['auth']);
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create')->middleware(['auth']);
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show')->middleware(['auth']);
Route::post('/cars', [CarController::class, 'store'])->name('cars.store')->middleware(['auth']);

Route::get('/products', [ProductsController::class, 'index'])->name('products.index')->middleware(['auth']);
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create')->middleware(['auth']);
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show')->middleware(['auth']);
Route::get('products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit')->middleware(['auth']);
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store')->middleware(['auth']);
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update')->middleware(['auth']);
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy')->middleware(['auth']);

Route::get('/feature', [FeatureFlagController::class, 'index'])->name('feature.index')->middleware(['auth']);
Route::get('/feature/create', [FeatureFlagController::class, 'create'])->name('feature.create')->middleware(['auth']);
Route::post('/feature', [FeatureFlagController::class, 'store'])->name('feature.store')->middleware(['auth']);
Route::get('feature/{id}/edit', [FeatureFlagController::class, 'edit'])->name('feature.edit')->middleware(['auth']);
Route::put('/feature/{id}', [FeatureFlagController::class, 'update'])->name('feature.update')->middleware(['auth']);

Route::get('/cep', [BuscaCepController::class, 'index'])->name('cep.consultacep')->middleware(['auth']);
Route::post('/cep', [BuscaCepController::class, 'consultacep'])->name('cep.consultacep')->middleware(['auth']);

Route::get('/pokeapi', [BattleController::class, 'index'])->name('pokeapi')->middleware(['auth']);
Route::post('/battle', [BattleController::class, 'battle'])->name('battle')->middleware(['auth']);

Route::get('/home', [HomeController::class, 'index']);
Route::get('/logout', function(){
  Auth::logout();
  return view('home');
});

Route::get('/poke', [BattleController::class, 'getTodosPokemons']);