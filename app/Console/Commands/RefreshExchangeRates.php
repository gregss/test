<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class RefreshExchangeRates
 * @package App\Console\Commands
 */
class RefreshExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coins:refresh-exchange-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh coins exchange rates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dispatch(new \App\Jobs\RefreshExchangeRates());
    }
}
