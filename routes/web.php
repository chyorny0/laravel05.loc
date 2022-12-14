<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ConverterController;
use App\Http\Controllers\DeckOfCardsController;
use App\Http\Controllers\SiteController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
Route::get('/catalog/{category_id?}', [CatalogController::class, 'catalog'])->name("site.catalog");
Route::get("catalog/{category_id}/{product_id}",[CatalogController::class,"product"])->name("site.product");
Route::get("/cart", [CartController::class,"getCart"])->name("cart");
Route::post("/add_to_cart", [CartController::class,"addToCart"])->name("addToCart");
Route::get("/converter", [ConverterController::class,"getAllCurrencies"])->name("getAllCurrencies");

Route::prefix("/21")->group(function(){
    Route::get("/",[DeckOfCardsController::class,"getCardDeck"]);
    Route::get("/getCard/{id}/{n}",[DeckOfCardsController::class,"getCard"]);
});


Route::get("/test", function (){
    \App\Jobs\FirstJob::dispatch("GG");
    \App\Jobs\FirstJob::dispatch("GG")->onQueue("gg");
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
