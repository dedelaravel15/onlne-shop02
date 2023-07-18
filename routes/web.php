<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
Route::get('add_product', [AdminController::class, 'add_product'])->name('add_product');
Route::post('store_add_product', [AdminController::class, 'store_add_product'])->name('store_add_product');
Route::get('product', [AdminController::class, 'show_product'])->name('show_product');
Route::get('edit/{product}', [AdminController::class, 'edit'])->name('edit');
Route::patch('update/{product}', [AdminController::class, 'update'])->name('update');
Route::delete('delete/{product}', [AdminController::class, 'delete'])->name('delete');
Route::get('orders', [AdminController::class, 'show_order'])->name('show_order');
Route::post('order/{order}/confirm', [AdminController::class, 'confirm'])->name('confirm');

Route::get('beranda', [UserController::class, 'beranda'])->name('beranda');
Route::get('description/{product}', [UserController::class, 'description'])->name('description');
Route::post('add_cart/{product}', [UserController::class, 'add_cart'])->name('add_cart');
Route::get('cart', [UserController::class, 'show_cart'])->name('show_cart');
Route::post('checkout', [UserController::class, 'checkout'])->name('checkout');
Route::get('transaction/{order}', [UserController::class, 'show_transaction'])->name('show_transaction');
Route::post('order/{order}/pay', [UserController::class, 'submit_payment'])->name('submit_payment');
Route::resource('/products', UserController::class);
Route::get('/search', [UserController::class, 'search'])->name('search');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
