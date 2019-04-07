<?php

namespace App\Services\Coins;

use App\Services\ApiServices\CryptoBridge\Actions\Ticker;
use App\Services\ApiServices\Exception as ApiServicesException;

/**
 * Class XORN
 * @package App\Services\Coins
 */
class XORN
{
    const CODE = 'XORN';

    /**
     * @param string $vs_coin
     * @return float
     * @throws ApiServicesException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getCurrentRate($vs_coin = BTC::CODE): float
    {
        $response = (new Ticker())
            ->setCoin(self::CODE)
            ->setVsCoin($vs_coin)
            ->send();

        if ($response->hasErrors()) {
            throw new ApiServicesException();
        }
        $data = $response->getData();
        if (!isset($data['last'])) {
            throw new ApiServicesException('Некорректный ответ сервиса');
        }

        return (float)$data['last'];
    }
}
