<?php

namespace App\Http\Controllers;

use App\Services\XornNet\Client;

/**
 * Class Test
 * @package App\Http\Controllers
 */
class Test
{
    public function __invoke()
    {
        $client = new Client(
            config('services.xornnet.host'),
            config('services.xornnet.port'),
            config('services.xornnet.login'),
            config('services.xornnet.password')
        );
        var_dump($client->send('getblockchaininfo')->getData());
        var_dump($client->send('listaccounts', [5])->getData());
        var_dump($client->send('listtransactions', ['*', 20, 100])->getData());
        //todo нет информации по методу
        //var_dump($client->send('masternodecount')->getData());
    }
}
