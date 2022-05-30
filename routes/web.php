<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\ProductController;


//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [FrontendController::class, 'index']);

Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'Placeorder']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);
});

// redirect to admin page
Route::middleware(['auth', 'isAdmin'])->group(function () {  // see http/kernel.php
    Route::get('/dashboard', 'Admin\AdminController@index');

    Route::get('categories',  [CategoryController::class, 'index']);
    Route::get('add-category',  [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'delete']);


    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product',  [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'delete']);
});
