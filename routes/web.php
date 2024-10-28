<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('/admin/products', ProductController::class)->names('admin.products');
    Route::resource('/admin/categories', CategoryController::class)->names('admin.categories');
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
});

Route::get('/customer/products', [ProductController::class, 'index'])->name('customer.products.index');
Route::post('/customer/orders', [OrderController::class, 'store'])->name('customer.orders.store');



Route::get('/your-page', function () {
    return view('your-view-name'); 
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

