<?php

namespace App\Services\XornNet;

use \GuzzleHttp\Client as HttpClient;
use GuzzleHttp\RequestOptions;

/**
 * Class Client
 * @package App\Services\XornNet
 */
class Client
{
    const JSONRPC_VERSION = 1.0;

    private $client;

    public function __construct(string $host, int $port, string $login, string $password)
    {
        $this->client = new  HttpClient([
            'base_uri' => $host . ':' . $port,
            RequestOptions::AUTH => [
                $login,
                $password,
            ]
        ]);
    }

    public function send(string $method, array $params = [])
    {
        $result = $this->client->post('/', [
            RequestOptions::JSON => [
                'method' => $method,
                'params' => $params,
                'id' => microtime(),
                'jsonrpc' => self::JSONRPC_VERSION
            ]
        ]);

        return new Response($result);
    }
}