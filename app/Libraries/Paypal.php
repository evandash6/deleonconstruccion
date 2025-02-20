<?php

namespace App\Libraries;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class Paypal
{
    public $apiContext;

    public function __construct()
    {
        $paypalConfig = config('Paypal'); // Usar configuración

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig->clientId,
                $paypalConfig->secret
            )
        );

        $this->apiContext->setConfig([
            'mode'           => $paypalConfig->mode,
            'log.LogEnabled' => true,
            'log.FileName'   => WRITEPATH . 'logs/paypal.log',
            'log.LogLevel'   => 'DEBUG',
            'cache.enabled'  => true,
        ]);
    }

    public function getApiContext()
    {
        return $this->apiContext;
    }
}
?>