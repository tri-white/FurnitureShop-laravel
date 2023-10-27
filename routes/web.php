<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CartController;
use App\Models\Product;


Route::get('/', function () {
    $products = Product::all();
    return view('welcome', ['products' => $products]);
})->name('welcome');

Route::get('/profile/{id}', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/registration', [UserController::class, 'registrationView'])->name('registrationView');
Route::post('/registration', [UserController::class, 'registration'])->name('registration');
Route::get('/login', [UserController::class, 'loginView'])->name('loginView');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/delete-user/{userId}', [UserController::class, 'delete'])->middleware('auth:admin')->name('delete-user');

Route::get('/shop/page={page}/searchKey={searchKey}/category={category}/sort={sort}', [ShopController::class, 'index'])->name('shop');
Route::post('/search', [ShopController::class, 'search'])->name('search');
Route::get('/add-product', [ShopController::class, 'addView'])->middleware('auth:admin')->name('add-product-page');

Route::post('/add-product', [ProductController::class, 'add'])->name('add-product');
Route::get('/product/{id}', [ProductController::class, 'details'])->name('product-details');
Route::post('/delete-product/{productId}', [ProductController::class, 'delete'])->middleware('auth:admin')->name('delete-product');

Route::post('/comment/{userid}/{productid}', [CommentController::class, 'add'])->middleware('auth')->name('add-comment');
Route::post('/delete-comment/{commentId}', [CommentController::class, 'delete'])->middleware('auth:admin')->name('delete-comment');

Route::get('/wishlist/{userid}', [WishController::class, 'index'])->middleware('auth')->name('wishlist');
Route::get('/wishlist/add/{userid}/{productid}', [WishController::class, 'add'])->middleware('auth')->name('add-wish');
Route::get('/wishlist/remove/{userid}/{productid}', [WishController::class, 'remove'])->middleware('auth:admin')->name('remove-wish');

Route::get('/cart/{userid}', [CartController::class, 'index'])->middleware('auth')->name('cart');
Route::post('/cart/add/{userid}/{productid}', [CartController::class, 'add'])->middleware('auth')->name('add-cart');
Route::get('/cart/remove/{userid}/{productid}', [CartController::class, 'remove'])->middleware('auth')->name('remove-cart');
Route::post('/update-cart/{userid}/{productid}', [CartController::class, 'updateCartItem'])->middleware('auth:admin')->name('update-cart');


Route::get('/all-orders', [OrderController::class, 'allOrders'])->middleware('auth:admin')->name('all-orders');
Route::post('/place-order/{userid}', [OrderController::class, 'placeOrder'])->middleware('auth')->name('place-order');
Route::get('/order/{orderid}', [OrderController::class, 'order'])->middleware('auth')->name('order');
Route::post('/delete-order/{orderId}', [OrderController::class, 'delete'])->middleware('auth:admin')->name('delete-order');






