<?php

namespace App\Http\Controllers;

use Omnipay\Omnipay;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {

        try {

            $totalImpuesto = $request->amount * ($request->impuesto / 100);
            $totalAmount = $request->amount + $totalImpuesto;
            
            // Use the number_format function to format the string
            $formattedtotalAmount = number_format($totalAmount, 2, '.', '');

            $response = $this->gateway->purchase(array(
                'amount' => $formattedtotalAmount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success/' . $request->producto_id ),
                'cancelUrl' => url('error'),
            ))->send();

            if($response->isRedirect()) {

                $response->redirect();

            } else {

                return $response->getMessage();

            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }

    public function index()
    {
        return view('payment.index');
    }

    public function show(Payment $payment)
    {

        return view('payment.show', [
            'payment' => $payment
        ]);
    }


    public function success(Request $request, $producto_id)
    {

        if($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if($response->isSuccessful()){
                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');

                $result = $payment->save();


                $message = "El id de tu transacción es " . $arr['id'];

                return view('success.index', [
                    'message' => $message
                ]);
                
            } else {
                $message = $response->getMessage();

                return view('error.index', [
                    'message' => $message
                ]);
            }

        } else {
            $message = "El Pago fue rechazado!";
            return view('error.index', [
                'message' => $message
            ]);
        }
    }   

    public function error()
    {
        $message = 'El usuario ha rechazado el pago!';

        return view('error.index', [
            'message' => $message
        ]);
    }

}
