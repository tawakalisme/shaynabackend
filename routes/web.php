<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
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
// Logout File Safe!!!!
Route::get('/dashboard', function(){
    return view(
        'dashboard'
    );
});

Route::middleware(['auth:sanctum', 'verified'])->get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/products/{id}/gallery', [ProductController::class, 'gallery'])->name('products.gallery');
Route::resource('products', ProductController::class);

Route::resource('product-galleries', ProductGalleryController::class);

Route::get('/transactions/{id}/set-status', [TransactionController::class, 'setStatus'])->name('transactions.status');
Route::resource('transactions', TransactionController::class);