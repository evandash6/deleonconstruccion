<?php

namespace App\Controllers;

use App\Libraries\Paypal;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PaypalController extends BaseController
{
    public function createPayment()
    {
        $paypal = new Paypal();
        $apiContext = $paypal->getApiContext();

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('10.00'); // Monto
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Pago de prueba con PayPal');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('paypal/success'))
                     ->setCancelUrl(base_url('paypal/cancel'));

        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions([$transaction]);

        try {
            $payment->create($apiContext);
            return redirect()->to($payment->getApprovalLink());
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function success()
    {
        $paypal = new Paypal();
        $apiContext = $paypal->getApiContext();

        $paymentId = $this->request->getGet('paymentId');
        $payerId = $this->request->getGet('PayerID');

        if (!$paymentId || !$payerId) {
            return 'Pago cancelado o inválido.';
        }

        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $apiContext);
            return 'Pago exitoso';
        } catch (\Exception $ex) {
            return 'Error en el pago: ' . $ex->getMessage();
        }
    }

    public function cancel()
    {
        return 'Pago cancelado por el usuario.';
    }
}
?>