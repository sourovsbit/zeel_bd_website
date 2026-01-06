<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function paypal_pay()
    {
        return view('paypal_pay');
    }

    public function pay_with_paypal(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "10.00",
                    ],
                ]
            ],
        ]);
        if(isset($response['id']))
        {
            foreach($response['links'] as $link)
            {
                if($link['rel'] == 'approve')
                {
                    return redirect()->away($link['href']);
                }
            }
        }
    }

    public function success()
    {
        return 'সাব্বাশ ! তুই পেমেন্ট কইরচত';
    }

    public function cancel()
    {

    }
}
