<?php

namespace App\Console\Commands;

use App\Helpers\CurrencyHelper;
use App\Models\Currency;
use Illuminate\Console\Command;

class CurrencyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get and save rates';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $haveCurrencies = CurrencyHelper::saveAllCurrencies();
        if($haveCurrencies == 1){
            $savingRates = CurrencyHelper::saveAllRates();
            if($savingRates == 1){
                $this->info("Rates saved");
            }else{
                $this->error($savingRates);
            }
        }else{
            $this->error($haveCurrencies);
        }
    }
}
