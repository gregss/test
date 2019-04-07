<?php

namespace App\Jobs;

use App\Services\CoinsExchangeRatesService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class CheckExchangeRates
 * @package App\Jobs
 */
class RefreshExchangeRates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @param CoinsExchangeRatesService $coins_exchange_rates_service
     * @throws \App\Services\ApiServices\Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(CoinsExchangeRatesService $coins_exchange_rates_service)
    {
        $coins_exchange_rates_service->refreshRates();
    }
}
