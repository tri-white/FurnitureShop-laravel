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


Route::middleware(['share.user.data'])->group(function () {
    Route::get('/', function () {
        $products = Product::all();
        return view('welcome', ['products' => $products]);
    })->name('welcome');
    
    
    Route::get('/registration', [UserController::class, 'registrationView'])->name('registrationView');
    Route::post('/registration', [UserController::class, 'registration'])->name('registration');
    Route::get('/login', [UserController::class, 'loginView'])->name('loginView');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/product/{id}', [ProductController::class, 'details'])->name('product-details');
    Route::get('/shop/page={page}/searchKey={searchKey}/category={category}/sort={sort}', [ShopController::class, 'index'])->name('shop');
    Route::post('/search', [ShopController::class, 'search'])->name('search');
});