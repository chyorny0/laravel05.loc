<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConverterController extends Controller
{
    public static function getAllCurrencies(){
        $response = Http::
        get("https://openexchangerates.org/api/latest.json?app_id=dd82465c528549d5af99be5d8def55fa");
        $response = $response->json()["rates"];
        return view("converter", compact("response"));
    }

    public static function getCurrency($currency){
        $response = Http::
        get("https://openexchangerates.org/api/latest.json?app_id=dd82465c528549d5af99be5d8def55fa");
        if(!array_key_exists($currency,$response->json()["rates"])){
            return "Мы не работаем с этой валютой";
        }
        return $response->json()["rates"][$currency];
    }
}
