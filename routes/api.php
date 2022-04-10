<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GeneralController;

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

//SAVING DATA TO DATABASE
Route::post('/customers', [GeneralController::class,'customers']);
Route::post('/products', [GeneralController::class,'products']);

//GETTING DATA TO VUE
Route::get('/products', [GeneralController::class,'getproducts']);
Route::get('/customers', [GeneralController::class,'getcustomers']);
