<?php

namespace App\Services\ApiServices\CryptoBridge\Actions;

use App\Services\ApiServices\Action;
use App\Services\ApiServices\Response;
use GuzzleHttp\RequestOptions;

/**
 * Класс запроса к ticker
 * Class Ticker
 * @package App\Services\ApiServices\CryptoBridge\Actions
 */
class Ticker extends Action
{
    const METHOD = 'v1/ticker';
    const TIMEOUT = 2;

    /** @var string $coin */
    private $coin;
    /** @var string $vs_coin */
    private $vs_coin;

    /**
     * Установить монету для проверки
     * @param $coin
     * @return $this
     */
    public function setCoin($coin): Ticker
    {
        $this->coin = $coin;
        return $this;
    }

    /**
     * Установить базовую монету
     * @param $vs_coin
     * @return $this
     */
    public function setVsCoin($vs_coin): Ticker
    {
        $this->vs_coin = $vs_coin;

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
            ]
        );

        return new Response($response);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return config('services.crypto-bridge.api.host')
            . self::METHOD . '/'
            . strtoupper($this->coin) . '_' . strtoupper($this->vs_coin);
    }
}
