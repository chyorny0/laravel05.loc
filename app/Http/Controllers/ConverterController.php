<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConverterController extends Controller
{
    public function getAllCurrencies(){
        $response = Http::
//        https://openexchangerates.org/api/latest.json?app_id=dd82465c528549d5af99be5d8def55fa
        get("https://api.priorbank.by/nbrb/rates");
        dd($response->json());
        return view("converter", compact("response"));
    }
}