<?php

namespace App\Http\Transformers;
use App\Entities\ExchangeRates;
use League\Fractal\TransformerAbstract;

/**
 * Class CoinCourseTransformer
 * @package App\Http\Transformers
 */
class CoinCourseTransformer extends TransformerAbstract
{
    public function transform(?ExchangeRates $item)
    {
        if ($item === null) {
            return [];
        }

        return [
            'coin1' => $item->getCoin1(),
            'coin2' => $item->getCoin2(),
            'value' => $item->getValue(),
        ];
    }
}
