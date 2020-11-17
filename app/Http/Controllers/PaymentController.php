<?php

namespace App\Http\Controllers;

use App\payeer;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Config;
use PayPal\Exception\PayPalConnectionException;


class PaymentController extends Controller
{
    private $apiContext;


    public function __construct()
    {
        $payPalConfig = [
            'mode' => env('PAYPAL_MODE', 'sandbox'),
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('/logs/paypal.log'),
            'log.LogLevel' => 'ERROR'
        ];
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID', 'AbLyf_FOHkmnfJX44GxZ-ABv6p7lKPGQMUKOj8dxS-HlqfBvS8Rqb4y7b9kR1ld7NK6MLt94FUDZPEFU'),
                env('PAYPAL_SECRET', 'EAv9d338ciulaL6PdA4OGNJWfK_lCCQuMES2iUstcBR3mvY9jldCNqmL2xo9DCioYayA-P4LcSonv4ym')
            )
        );

        $this->apiContext->setConfig($payPalConfig);
    }



    public function payWithPayPal(Request $request)
    {

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('459.00');
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Compra');

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/Servicios')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);
        // dd($result->getPayer()->getPayerInfo()->getEmail());
        // dd($result->getPayer()->getPayerInfo());
        if ($result->getState() === 'approved') {
            $Payer = new payeer;
            $Payer->Payer_id = $result->getPayer()->getPayerInfo()->getPayerId();
            $Payer->First_name = $result->getPayer()->getPayerInfo()->getFirstName();
            $Payer->Last_name = $result->getPayer()->getPayerInfo()->getLastName();
            $Payer->Email = $result->getPayer()->getPayerInfo()->getEmail();
            $Payer->save();
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            return redirect('/Servicios')->with(compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/Servicios')->with(compact('status'));
    }
}
