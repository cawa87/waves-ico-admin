<?php

namespace AppBundle\Wrappers;


class CurrencyRateWrapper
{

    protected $apiUrl;

    protected $methodUrl = '/ticker/';

    protected $client;


    /**
     * CurrencyRateWrapper constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->apiUrl = $url;
    }


    public function getRate($currencyFrom, $currencyTo = 'USD')
    {
        $client = $this->client;
        $url = $this->apiUrl . $this->methodUrl . $currencyFrom . '/' . '?convert=' . $currencyTo;
        // var_dump($url); die();
        $res = $client->request('GET', $url);
        echo $res->getStatusCode();
// 200
        echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
        echo $res->getBody();
    }
}