<?php

namespace App\Services\XornNet;

/**
 * Class Response
 * @package App\Services\XornNet
 */
class Response
{
    private $data;

    /**
     * Response constructor.
     * @param $data
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
