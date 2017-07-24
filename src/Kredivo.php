<?php

namespace WPandu\Kredivo;

/**
 * Class Kredivo
 *
 * @package WPandu\Kredivo
 */
class Kredivo
{
    //For Testing
    const BASESANBOXURL = 'https://sandbox.kredivo.com/kredivo';

    //For Production
    const BASEPRODUCTIONURL = 'https://sandbox.kredivo.com/kredivo';

    //API Version Kredivo
    const VERSION = 'v2';

    //For handle checkout page from kredivo
    const CHECKOUTENDPOINT = 'checkout_url';

    //For handle payment types available
    const PAYMENTTYPESENDPOINT = 'payments';

    //For confirm payment
    const CONFIRMENDPOINT = 'update';

    public $isProduction = false;

    public $serverKey; //kredivo's merchant unique key

    public function __construct($isProduction, $serverKey)
    {
        $this->isProduction = $isProduction;
        $this->serverKey    = $serverKey;
    }

    public function getCheckoutUrl()
    {
        return self::wrapUrl(self::CHECKOUTENDPOINT);
    }

    public function getPaymentTypesUrl()
    {
        return self::wrapUrl(self::PAYMENTTYPESENDPOINT);
    }

    public function getConfirmUrl()
    {
        return self::wrapUrl(self::CONFIRMENDPOINT);
    }

    private static function wrapUrl($endpoint)
    {
        return sprintf('%s/%s/%s', self::$isProduction ? self::BASEPRODUCTIONURL : self::BASESANBOXURL, self::VERSION, $endpoint);
    }
}
