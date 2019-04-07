<?php

namespace App\Services\ApiServices;

use \GuzzleHttp\Client as HttpClient;

/**
 * Class Action
 * @package App\Services\ApiServices
 */
abstract class Action
{
    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->client = new HttpClient();
    }

    /**
     * Выполнить запрос
     * @return mixed
     */
    abstract function send();

    /**
     * @return string
     */
    abstract function getUrl();
}
