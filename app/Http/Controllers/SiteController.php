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

    public function store(){
        $categories = Category::all();
        $categories = $categories->keyBy("id");
//        $products = Product::paginate(9);
        $products = Product::query()
            ->orderBy("price")
            ->get();
        // сделал запрос сразу с сортировкой по цене (возростание)
        //для того, чтобы в асайде в разделе TOP SELLING вывести первый подмассив просто

        $products = $products->chunk(3);
        return view("site.store", compact("products","categories"));
    }

}
