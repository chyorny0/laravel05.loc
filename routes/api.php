<?php

use App\Http\Controllers\Api\CategoryController;
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

Route::get("/users",[\App\Http\Controllers\Api\UserController::class,"index"]);
Route::get("/users/{id}",[\App\Http\Controllers\Api\UserController::class,"show"]);

//Route::prefix('category')->group(callback: function(){
//
//    Route::get("/",[\App\Http\Controllers\Api\CategoryController::class,"index"]);
//    Route::get("/show/{id}",[\App\Http\Controllers\Api\CategoryController::class,"show"]);
//    Route::post("/store",[\App\Http\Controllers\Api\CategoryController::class,"store"]);
//    Route::post("/update/{id}",[\App\Http\Controllers\Api\CategoryController::class,"update"]);
//    Route::post("/destroy/{id}",[\App\Http\Controllers\Api\CategoryController::class,"destroy"]);
//
//});

Route::resource('category', CategoryController::class);
