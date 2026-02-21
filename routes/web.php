<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');


//#################################################################
// admin routes
//#################################################################

// dashboard
Route::get('/admin/dashboard', function (){
    return view('admin.index');
});

// add-product
Route::get('/admin/add-product', function (){
    return view('admin.add-product');
});

// Auth Route
Route::get('/admin/login', [LoginController::class, 'create']);

// Product Route
Route::resource('admin/product', ProductController::class);