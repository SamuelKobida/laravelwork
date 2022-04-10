<?php

use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//CUSTOMERS
Route::post('/customers', [CustomersController::class,'store']);
Route::get('/customers', [CustomersController::class,'customers']);
Route::delete('/customers/delete/{id}', [CustomersController::class, 'delete']);

//PRODUCTS
Route::post('/products', [ProductsController::class,'store']);
Route::get('/products', [ProductsController::class,'products']);
Route::delete('/products/delete/{id}', [ProductsController::class, 'delete']);
