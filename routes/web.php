<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::get('/cart/{id}', [UserController::class, 'cart'])->name('cart');
Route::get('/wishlist/{id}', [UserController::class, 'wishlist'])->name('wishlist');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/registration', [UserController::class, 'registration'])->name('registration');

