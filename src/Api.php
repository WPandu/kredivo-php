<?php

namespace WPandu\Kredivo;

use GuzzleHttp\Client;

/**
 * Class Api
 * Api for Kredivo communications
 *
 * @package WPandu\Kredivo
 */
class Api
{

    private $client;
    private $kredivo;
    
    //Api Constructor
    public function __construct($isProduction, $serverKey)
    {
        $this->client  = new Client();
        $this->kredivo = new Kredivo($isProduction, $serverKey);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function checkout($data)
    {
        $data['server_key'] = $this->kredivo->serverKey;
        return $this->postResponse($this->kredivo->getCheckoutUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function paymentTypes($data)
    {
        $data['server_key'] = $this->kredivo->serverKey;
        return $this->postResponse($this->kredivo->getPaymentTypesUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function confirm($data)
    {
        return $this->getResponse($this->kredivo->getConfirmUrl(), $data);
    }

    /**
     * @param $url
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function postResponse($url, $data)
    {
        $response = $this->client->post($url, [
            ['json' => $data],
        ]);

        return $response;
    }


    /**
     * @param $url
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function getResponse($url, $data)
    {
        $response = $this->client->get($url, [
            ['query' => $data],
        ]);

        return $response;
    }
}
