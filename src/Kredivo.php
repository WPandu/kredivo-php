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
    const baseSandboxUrl = 'https://sandbox.kredivo.com/kredivo/';

    //For Production
    const baseProductionUrl = 'https://sandbox.kredivo.com/kredivo/';

    //For handle checkout page from kredivo
    const checkoutUrl = 'v2/checkout_url';

    //For handle payment types available
    const paymentTypesUrl = 'v2/payments';

    //For confirm payment
    const confirmUrl = 'v2/update';

    public static $isProduction = false;

    public static $serverKey; //kredivo's merchant unique key

    public static function getCheckoutUrl()
    {
        return self::wrapUrl(self::checkoutUrl);
    }

    public static function getPaymentTypesUrl()
    {
        return self::wrapUrl(self::paymentTypesUrl);
    }

    public static function getConfirmUrl()
    {
        return self::wrapUrl(self::confirmUrl);
    }

    private static function wrapUrl($url)
    {
        return self::$isProduction ? self::productionUrl . $url : self::sandboxUrl . $url;
    }
}
