<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/items/all', [\App\Http\Controllers\ItemsController::class,'all']);
Route::get('/items/{id}', [\App\Http\Controllers\ItemsController::class,'get']);
Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);


Route::group(['middleware' =>  ['auth:sanctum']], function () {
    Route::post('/items', [\App\Http\Controllers\ItemsController::class,'save']);
    Route::put('/items/{id}', [\App\Http\Controllers\ItemsController::class,'modify']);
    Route::delete('/items/{id}', [\App\Http\Controllers\ItemsController::class,'delete']);

    //Route::resource('items', \App\Http\Controllers\ApiController::class);
});

