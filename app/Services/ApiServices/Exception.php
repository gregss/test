<?php

namespace App\Services\ApiServices;

/**
 * Class Exception
 * @package App\Services\ApiServices
 */
class Exception extends \Exception
{
    public function __construct($message = 'Ошибка api сервиса', $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
