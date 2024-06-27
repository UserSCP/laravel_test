<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BrandController;
Route::get('/', function () {return view('welcome');})->name('home');
Route::resource('products', ProductsController::class);
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
