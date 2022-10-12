<?php

namespace App\Console\Commands;

use App\Http\Controllers\ConverterController;
use Illuminate\Console\Command;

class FirstCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:rates {currency?} {--send}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing currencies rates';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!$this->argument("currency")){
            $currency = mb_strtoupper($this->ask("Для какой валюты вы хотите получть курс?"));
        }

        $askCurrencyRate = ConverterController::getCurrency($currency);

        if(gettype($askCurrencyRate) == "string"){
            $message = $askCurrencyRate;
            $this->error($message);
        } else {
            $message = "1 USD = " . round($askCurrencyRate, 2) . " " . $currency;

            $send = $this->option("send");
            if (!$send) {
                $send = $this->confirm("Желаете ли вы отправить курс валют на почту?");
            }

            if($send){
                $from = $this->ask("Почта отправителя: ");
                $fromName = $this->ask("Имя отправителя: ");
                $to = $this->ask("Почта получателя: ");
                \App\Jobs\FirstJob::dispatch($message, $from, $fromName, $to);
            }
        }
    }
}
