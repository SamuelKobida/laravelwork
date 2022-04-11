<?php

use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\InvoiceitemsController;
use App\Http\Controllers\Api\InvoicesController;
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

//INVOICES
Route::post('/invoices', [InvoicesController::class,'store']);
Route::get('/invoices', [InvoicesController::class,'invoices']);
Route::delete('/invoices/delete/{id}', [InvoicesController::class, 'delete']);

//INVOICE_ITEMS
Route::post('/invoice_items', [InvoiceitemsController::class,'store']);
Route::get('/invoice_items/{id}', [InvoiceitemsController::class,'invoiceitems']);
Route::delete('/invoice_items/delete/{id}', [InvoiceitemsController::class, 'delete']);
