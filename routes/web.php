<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\ManageSiteController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController as ProController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/product/{id}/{title}', [ProController::class, 'showProduct'])->name('product-details');

//#################################################################
// admin routes
//#################################################################

// dashboard
Route::get('/admin/dashboard', function (){
    return view('admin.index');
})->middleware('auth');

// add-product
Route::get('/admin/add-product', function (){
    return view('admin.add-product');
});

// Auth Route
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/admin/logout', [AuthController::class, 'logout']);

// Product Route
Route::resource('admin/product', ProductController::class);

// Manage Site Content Route
Route::get('/admin/manage-content', [ManageSiteController::class, 'index'])->name('manage-content');
// Store Site Content
Route::post('/admin/manage-content/store', [ManageSiteController::class, 'store'])->name('store-content');

// Testimonial Resource Route
Route::resource('admin/testimonial', TestimonialController::class);