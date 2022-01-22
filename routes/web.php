<?php

use App\Http\Controllers\Backend\Filter\FilterController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductDetailsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('welcome');
})->name('home');
// Route::get('product/details/{product}/{name}', [ProductDetailsController::class, 'index'])->name('product.details');
// Route::get('catagory/{name}', [FilterController::class, 'catagory'])->name('catagory');
// Route::post('product/cart/add', [CartController::class, 'store'])->name('cart.add');


Auth::routes();
include_once __DIR__."/backend.php";

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
