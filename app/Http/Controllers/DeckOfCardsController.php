<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeckOfCardsController extends Controller
{
    private static $base_url = "https://deckofcardsapi.com/api/deck/";

    public static function getCardDeck()
    {
        $query = [
            "deck_count" => 1,
        ];
        $response = Http::get(self::$base_url."new/shuffle/", $query);
        $id = $response->json()["deck_id"];
        return view("test.cardGame", compact("id"));
    }

    public static function getCard($id,$n){
        $query = [
            "count" => $n,
        ];
        $response = Http::get(self::$base_url.$id."/draw",$query);
        return $response->json()["cards"][0];
    }
}

