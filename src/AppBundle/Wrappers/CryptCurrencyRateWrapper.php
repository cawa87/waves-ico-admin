<?php

namespace AppBundle\Wrappers;


class CryptCurrencyRateWrapper
{

    protected $apiUrl;

    protected $methodUrl = 'ticker/';

    protected $client;


    /**
     * CryptCurrencyRateWrapper constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->apiUrl = $url;
    }


    public function getCryptRate($currencyFrom, $currencyTo = 'USD')
    {
        $client = $this->client;
        $url = $this->apiUrl . $this->methodUrl . $currencyFrom . '/' . '?convert=' . $currencyTo;
        // var_dump($url); die();
        $res = $client->request('GET', $url);

        return json_decode($res->getBody())[0];
    }

}