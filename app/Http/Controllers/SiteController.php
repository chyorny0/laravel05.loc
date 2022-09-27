<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __invoke()
    {
        //select * from products where active = 1 and category_id = 1 order by id desc
        $latestProducts = Product::query()
            ->where('active', 1)
            ->limit(10)
            ->latest()
            ->get();
//        $collection = collect([1,2,3]);
//        $collection[] = 11;
//        dump($collection);
        return view('site.index', compact('latestProducts'));

    }

    public function store(Request $request){
        $categories = Category::withCount("products")->get();
        $products = Product::
            where("active",1)
            ->orderBy("price")
            ->with("category")
            ->get();
        return view("site.store", compact("products","categories"));
    }

    public function product($category_id, $product_id=null){
        if($product_id) {
            $product = Product::find($product_id);
            return view("site.product", compact("product"));
        }else {
            $category = Category::find($category_id);
            return view("site.category", compact("category"));
        }
    }

}
