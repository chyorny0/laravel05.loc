<?php

namespace App\Helpers;

use App\Models\Currency;
use App\Models\Rate;
use Illuminate\Support\Facades\Http;

class CurrencyHelper
{
    public static function getAllCurrenciesWithRates($onDate=null, $periodicity=0)
    {
        $query = [
            "query" => [
                "onDate" => $onDate,
                "periodicity" => $periodicity
            ]
        ];
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client
                ->request("Get", "https://www.nbrb.by/api/exrates/rates", $query)
                ->getBody()
                ->getContents();
        }catch ( \GuzzleHttp\Exception\ConnectException $exception){
            return $exception->getMessage();
        }
        $response = collect(json_decode($response))->keyBy("Cur_Abbreviation");
        return $response;
    }

    public static function saveAllCurrencies()
    {
        $currencies_from_db = Currency::all("cur_abbr")->keyBy("cur_abbr")->toArray();
        $currencies = json_decode(CurrencyHelper::getAllCurrenciesWithRates());
        try {
            foreach ($currencies as $currency) {
                if (!array_key_exists($currency->Cur_Abbreviation, $currencies_from_db)) {
                    $attributes = [
                        "cur_abbr" => $currency->Cur_Abbreviation,
                        "cur_full_name" => $currency->Cur_Name,
                        "cur_scale" => $currency->Cur_Scale
                    ];
                    Currency::create($attributes);
                }
            }
            return 1;
        } catch (\ErrorException $exception) {
            return $exception->getMessage();
        }
    }

    public static function saveAllRates(){
        $currencies_from_db = Currency::all("id","cur_abbr")->keyBy("cur_abbr")->toArray();
        $currencies = CurrencyHelper::getAllCurrenciesWithRates();
        $date = getdate();
        $date = $date["year"]."-".$date["mon"]."-".$date["mday"];
        try{
            foreach ($currencies as $currency){
                $attributes = [
                    "date" => $date,
                    "curr_id" => $currencies_from_db[$currency->Cur_Abbreviation]["id"],
                    "rate" => $currency->Cur_OfficialRate,
                ];
                Rate::create($attributes);
            }
            return 1;
        }catch (\ErrorException $exception){
            return $exception->getMessage();
        }
    }
}
