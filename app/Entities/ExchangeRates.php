<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
    const FIELD_COIN1 = 'coin1';
    const FIELD_COIN2 = 'coin2';
    const FIELD_VALUE = 'value';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::FIELD_COIN1,
        self::FIELD_COIN2,
        self::FIELD_VALUE,
    ];

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->getAttribute(self::FIELD_VALUE);
    }
}
