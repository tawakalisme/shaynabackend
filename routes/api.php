<?php

use App\Http\Controllers\API\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [ProductController::class, 'all']); //Route Product API Controller
Route::post('checkout', [CheckoutController::class, 'checkout']); //Route API Checkout untuk mengirim data
Route::get('transactions/{id}', [TransactionController::class, 'get']); //Route API Transaction