<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\SiteController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ArticleController;
use Illuminate\Support\Facades\Storage;


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

Route::get('/', SiteController::class);
Route::get("/cart", [CartController::class,"getCart"])->name("cart");
Route::post("/add_to_cart", [CartController::class,"addToCart"])->name("addToCart");



Route::post("/test", function (\Illuminate\Http\Request $request){
    $data = $request->all();
    return response()->json($data)->setStatusCode(401);
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->prefix('admin')->group(callback: function(){

    Route::get('/', [MyController::class, 'index'])->name('')->withoutMiddleware('auth');

    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'articles' => ArticleController::class,
    ]);
});
