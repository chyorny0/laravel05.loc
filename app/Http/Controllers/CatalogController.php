<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog($category_id=null){
        if($category_id){
            $category = Category::find($category_id);
            return view("site.category", compact("category"));
        } else {
            $categories = Category::withCount("products")->get();
            $products = Product::
            where("active",1)
                ->orderBy("price")
                ->with("category")
                ->get();
            return view("site.catalog", compact("products","categories"));
        }
    }

    public function product($category_id, $product_id){
        if($product_id) {
            $product = Product::
            where('category_id', $category_id)
            ->where('id', $product_id)
            ->firstOrFail();
            return view("site.product", compact("product"));
        }
    }

}
