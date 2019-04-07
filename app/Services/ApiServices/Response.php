<?php

namespace App\Services\ApiServices;

use Psr\Http\Message\MessageInterface;

/**
 * Class Response
 * @package App\Services\ApiServices
 */
class Response
{
    /**
     * @var MessageInterface
     */
    private $data;

    /**
     * Response constructor.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function hasErrors()
    {
        return $this->data->getStatusCode() !== 200;
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->data->getBody()->getContents();
    }

    /**
     * @return mixed
     *
     */
    public function getData()
    {
        return \GuzzleHttp\json_decode($this->getContents(), true);
    }
}
