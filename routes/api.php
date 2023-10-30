<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CartController;
use App\Models\Product;


Route::middleware(['share.user.data'])->group(function () {

    Route::middleware('auth:sanctum')->group(function() {
        Route::post('/place-order/{userid}', [OrderController::class, 'placeOrder'])->name('place-order');
        Route::get('/order/{orderid}', [OrderController::class, 'order'])->name('order');
        Route::post('/comment/{userid}/{productid}', [CommentController::class, 'add'])->name('add-comment');
        Route::get('/wishlist/{userid}', [WishController::class, 'index'])->name('wishlist');
        Route::get('/wishlist/add/{userid}/{productid}', [WishController::class, 'add'])->name('add-wish');
        Route::get('/cart/{userid}', [CartController::class, 'index'])->name('cart');
        Route::post('/cart/add/{userid}/{productid}', [CartController::class, 'add'])->name('add-cart');
        Route::get('/cart/remove/{userid}/{productid}', [CartController::class, 'remove'])->name('remove-cart');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
    });
    Route::middleware('auth:sanctum','abilities:all')->group(function() {
        Route::post('/delete-order/{orderId}', [OrderController::class, 'delete'])->name('delete-order');
        Route::get('/wishlist/remove/{userid}/{productid}', [WishController::class, 'remove'])->name('remove-wish');
        Route::post('/delete-product/{productId}', [ProductController::class, 'delete'])->name('delete-product');
        Route::post('/add-product', [ProductController::class, 'add'])->name('add-product');
        Route::get('/add-product', [ShopController::class, 'addView'])->name('add-product-page');
        Route::post('/delete-user/{userId}', [UserController::class, 'delete'])->name('delete-user');
        Route::post('/delete-comment/{commentId}', [CommentController::class, 'delete'])->name('delete-comment');
        Route::get('/all-orders', [OrderController::class, 'allOrders'])->name('all-orders');
        Route::post('/update-cart/{userid}/{productid}', [CartController::class, 'updateCartItem'])->name('update-cart');
    });
});
