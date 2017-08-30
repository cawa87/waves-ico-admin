<?php

namespace AppBundle\Wrappers;


class WavesNodeWrapper
{

    protected $apiUrl;
    protected $apiKey;

    protected $client;


    /**
     * WavesNodeWrapper constructor.
     * @param $url
     */
    public function __construct($url, $apiKey)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->apiUrl = $url;
        $this->apiKey = $apiKey;
    }


    /* public function getRate($currencyFrom, $currencyTo = 'USD')
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
     }*/

    public function generateUserWalletAddress()
    {

        $client = $this->client;
        $url = $this->apiUrl . 'addresses';
        // var_dump($url); die();

        $res = $client->request('POST', $url, [
            'headers' => ['api_key' => $this->apiKey]
        ]);
        //echo $res->getStatusCode();

        $resp = json_decode($res->getBody());

        return $resp->address;
    }
}