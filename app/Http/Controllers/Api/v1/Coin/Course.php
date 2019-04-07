<?php

namespace App\Http\Controllers\Api\v1\Coin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoinCourseRequest;
use App\Http\Transformers\CoinCourseTransformer;
use App\Services\CoinsExchangeRatesService;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

/**
 * Class Course
 * @package App\Http\Controllers\Api\v1\Coin
 */
class Course extends Controller
{
    /**
     * @param string $coin
     * @param CoinCourseRequest $request
     * @param CoinsExchangeRatesService $service
     * @return array
     */
    public function __invoke(string $coin, CoinCourseRequest $request, CoinsExchangeRatesService $service)
    {
        $manager = new Manager();
        $exchange_rate = $service->getRate($coin, $request->get('currency'));

        return $manager
            ->createData(new Item($exchange_rate,  new CoinCourseTransformer))
            ->toArray();
    }
}
