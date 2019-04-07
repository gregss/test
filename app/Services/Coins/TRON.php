<?php

namespace App\Services\Coins;

use App\Services\ApiServices\Coingecko\Actions\CoinsMarkets;
use App\Services\ApiServices\Exception as ApiServicesException;

/**
 * Class XORN
 * @package App\Services\Coins
 */
class TRON
{
    const CODE = 'TRON';

    /**
     * @param string $coin
     * @return float
     * @throws ApiServicesException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getCurrentRate($coin = BTC::CODE): float
    {
        $response = (new CoinsMarkets())->setCoin($coin)->send();
        if ($response->hasErrors()) {
            throw new ApiServicesException();
        }
        $data = $response->getData();
        $key = array_search(strtolower(self::CODE), array_column($data, 'id'));
        if (!isset($data[$key]['current_price'])) {
            throw new ApiServicesException('Некорректный ответ сервиса');
        }

        return (float)$data[$key]['current_price'];
    }
}
