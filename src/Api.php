<?php

namespace WPandu\Api;

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
    
    //Api Constructor
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function checkout($data)
    {
        $data['server_key'] = Kredivo::$serverKey;
        return self::postResponse(Kredivo::getCheckoutUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function paymentTypes($data)
    {
        $data['server_key'] = Kredivo::$serverKey;
        return self::postResponse(Kredivo::getPaymentTypesUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function paymentTypes($data)
    {
        $data['server_key'] = Kredivo::$serverKey;
        return self::postResponse(Kredivo::getPaymentTypesUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function confirm($data)
    {
        return self::getResponse(Kredivo::getConfirmUrl(), $data);
    }

    /**
     * @param $url
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    private static function postResponse($url, $data, $method)
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
    private static function getResponse($url, $data)
    {
        $response = $this->client->get($url, [
            ['query' => $data],
        ]);

        return $response;
    }
}
