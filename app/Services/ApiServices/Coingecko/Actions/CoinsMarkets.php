<?php

namespace App\Services\ApiServices\Coingecko\Actions;

use App\Services\ApiServices\Action;
use App\Services\ApiServices\Response;
use GuzzleHttp\RequestOptions;

/**
 * Класс запроса к coins/markets
 * Class CoinsMarkets
 * @package App\Services\ApiServices\Coingecko\Action
 */
class CoinsMarkets extends Action
{
    const METHOD = 'v3/coins/markets';
    const TIMEOUT = 2;

    private $coin;

    /**
     * Установить проверяемую монету
     * @param $coin
     * @return $this
     */
    public function setCoin($coin): CoinsMarkets
    {
        $this->coin = $coin;
        return $this;
    }

    /**
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(): Response
    {
        $response = $this->client->request(
            'GET',
            $this->getUrl(),
            [
                RequestOptions::TIMEOUT => self::TIMEOUT,
                RequestOptions::QUERY => [
                    'vs_currency' => strtolower($this->coin)
                ],
            ]
        );

        return new Response($response);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return config('services.coingecko.api.host') . self::METHOD;
    }
}
