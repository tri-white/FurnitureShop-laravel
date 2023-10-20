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

Route::get('/registration', [UserController::class, 'registrationView'])->name('registrationView');
Route::post('/registration', [UserController::class, 'registration'])->name('registration');
Route::get('/login', [UserController::class, 'loginView'])->name('loginView');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/shop/page={page}/searchKey={searchKey}/category={category}/sort={sort}', [ShopController::class, 'index'])->name('shop');
Route::post('/search', [ShopController::class, 'search'])->name('search');
Route::get('/add-product', [ShopController::class, 'addView'])->name('add-product-page');

Route::get('/all-orders', [OrderController::class, 'allOrders'])->name('all-orders');

Route::post('/add-product', [ProductController::class, 'add'])->name('add-product');
Route::get('/product/{id}', [ProductController::class, 'details'])->name('product-details');

Route::post('/comment/{userid}/{productid}', [CommentController::class, 'add'])->name('add-comment');

Route::get('/wishlist/{userid}', [WishController::class, 'index'])->name('wishlist');
Route::get('/wishlist/add/{userid}/{productid}', [WishController::class, 'add'])->name('add-wish');
Route::get('/wishlist/remove/{userid}/{productid}', [WishController::class, 'remove'])->name('remove-wish');

Route::get('/cart/{userid}', [CartController::class, 'index'])->name('cart');
Route::get('/cart/add/{userid}/{productid}', [CartController::class, 'add'])->name('add-cart');
Route::get('/cart/remove/{userid}/{productid}', [CartController::class, 'remove'])->name('remove-cart');








