<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
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
    $products = Product::all();
    return view('welcome', ['products' => $products]);
})->name('welcome');

Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::get('/login', [UserController::class, 'loginView'])->name('loginView');
Route::get('/registration', [UserController::class, 'registrationView'])->name('registrationView');

Route::get('/cart/{id}', [UserController::class, 'cart'])->name('cart');
Route::get('/wishlist/{id}', [UserController::class, 'wishlist'])->name('wishlist');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/registration', [UserController::class, 'registration'])->name('registration');

Route::get('/shop/page={page}', [ShopController::class, 'index'])->name('shop');
Route::get('/add-product', [ShopController::class, 'addView'])->name('add-product-page');
Route::post('/add-product', [ShopController::class, 'add'])->name('add-product');
Route::get('/search-product', [ShopController::class, 'search'])->name('search-shop');


Route::get('/all-orders', [OrderController::class, 'allOrders'])->name('all-orders');

Route::get('/product/{id}', [ProductController::class, 'details'])->name('product-details');



