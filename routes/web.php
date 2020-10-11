<?php

use App\Http\Livewire\History;
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

/**
 * DASHBOARD
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/**
 * ACCOUNTING
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/accounting', function () {
    return view('admin.accounting');
})->name('accounting');

/**
 * BRANDS
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/brands', function () {
    return view('admin.brands');
})->name('brands');

Route::middleware(['auth:sanctum', 'verified'])->get('/brands/create', function () {
    return view('admin.brand-form');
})->name('brand-form');

/**
 * COLORS
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/colors', function () {
    return view('admin.colors');
})->name('colors');

Route::middleware(['auth:sanctum', 'verified'])->get('/colors/create', function () {
    return view('admin.color-form');
})->name('color-form');

/**
 * PRODUCTS
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/products', function () {
    return view('admin.products');
})->name('products');

Route::middleware(['auth:sanctum', 'verified'])->get('/products/create', function () {
    return view('admin.product-form');
})->name('product-form');

Route::middleware(['auth:sanctum', 'verified'])->get('/products/detail/{id}', function () {
    return view('admin.product-detail');
})->name('product-detail');

/**
 * HISTORY
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/history', function () {
    return view('admin.history');
})->name('history');
