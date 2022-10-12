<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FirstCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:nbrb {currency?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing currencies rates nbrb';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!$this->argument("currency")){
            $currency = $this->confirm("which currency?",1);
            $this->info($currency);
        }
    }
}
