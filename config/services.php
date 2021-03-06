<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'crypto-bridge' => [
        'api' => [
            'host' => env('CRYPTO_BRIDGE_API_HOST', 'https://api.crypto-bridge.org/api/'),
        ],
    ],
    'coingecko' => [
        'api' => [
            'host' => env(
                'COINGECKO_API_HOST',
                'https://api.coingecko.com/api/'
            ),
        ],
    ],
    'xornnet' => [
        'host' => env('XORNNET_HOST'),
        'port' => env('XORNNET_PORT'),
        'login' => env('XORNNET_LOGIN'),
        'password' => env('XORNNET_PASSWORD'),
    ],
];
