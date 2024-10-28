<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController; // تأكد من استيراد ProductController
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// مسار لتسجيل الدخول
Route::post('/login', [AuthController::class, 'login']);
// مسار لتسجيل الخروج مع تطبيق Middleware للمصادقة
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// مسار لاسترجاع المنتجات (تأكد من أنك قد أنشأت ProductController و method index)
Route::get('/products', [ProductController::class, 'index']);

Route::middleware('admin')->group(function () {
    Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::get('/admin/orders', [OrderController::class, 'index']);
});

// نقطة النهاية لإنشاء الطلبات للمستخدمين
Route::post('/customer/orders', [OrderController::class, 'store'])->middleware('auth:sanctum');

