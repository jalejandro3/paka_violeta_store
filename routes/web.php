<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/products', function () {
    return view('admin.products');
})->name('products');

Route::middleware(['auth:sanctum', 'verified'])->get('/accounting', function () {
    return view('admin.accounting');
})->name('accounting');

Route::middleware(['auth:sanctum', 'verified'])->get('/product/create', function () {
    return view('admin.product-form');
})->name('product-form');

Route::middleware(['auth:sanctum', 'verified'])->get('/history', function () {
    return view('admin.history');
})->name('history');
