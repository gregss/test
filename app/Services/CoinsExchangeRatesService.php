<?php

namespace App\Services;

use App\Entities\ExchangeRates;
use App\Services\Coins\BTC;
use App\Services\Coins\TRTT as TRTTCoinService;
use App\Services\Coins\XORN as XORNCoinService;
use App\Services\Coins\ETH as ETHCoinService;
use App\Services\Coins\TRON as TRONCoinService;

/**
 * Сервис работы с обменными курсами цифровых валют
 * Class CoinsExchangeRates
 * @package App\Services
 */
class CoinsExchangeRatesService
{
    /**
     * @throws ApiServices\Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refreshRates(): void
    {
        //todo для большого числа монет нужно заавтоматизировать
        //todo либо использовать единый сервис
        $trtt_rate = TRTTCoinService::getCurrentRate();
        $this->setRates(TRTTCoinService::CODE, BTC::CODE, $trtt_rate);
        $xorn_rate = XORNCoinService::getCurrentRate();
        $this->setRates(XORNCoinService::CODE, BTC::CODE, $xorn_rate);
        $eth_rate = ETHCoinService::getCurrentRate();
        $this->setRates(ETHCoinService::CODE, BTC::CODE, $eth_rate);
        $tron_rate = TRONCoinService::getCurrentRate();
        $this->setRates(TRONCoinService::CODE, BTC::CODE, $tron_rate);
    }

    /**
     * Записать значения полученных курсов в бд
     * @param $coin_1
     * @param $coin_2
     * @param $value
     */
    private function setRates($coin_1, $coin_2, $value): void
    {
        ExchangeRates::query()
            ->where(ExchangeRates::FIELD_COIN1, '=', $coin_1)
            ->where(ExchangeRates::FIELD_COIN2, '=', $coin_2)
            ->updateOrCreate(
                [
                    ExchangeRates::FIELD_COIN1 => $coin_1,
                    ExchangeRates::FIELD_COIN2 => $coin_2,
                ],
                [
                    ExchangeRates::FIELD_VALUE => $value,
                ]
            );
    }
}
