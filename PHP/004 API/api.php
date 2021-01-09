<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/', [ProductsController::class, 'products']);
Route::get('/products/{id}', [ProductsController::class, 'productsById']);
Route::post('/products/', [ProductsController::class, 'productsSave']);
Route::put('/products/{id}', [ProductsController::class, 'productsEdit']);
Route::delete('/products/{id}', [ProductsController::class, 'productsDelete']);
