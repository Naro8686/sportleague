<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Races;
use Carbon\Carbon;
use Cassandra\Date;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return ResponseAlias
     * @throws Exception
     */
    public function payment()
    {
        $league = League::find(1);
        $data = [];
        $data['items'] = [
            [
                'name' => 'Sport League',
                'price' => $league->price,
                'desc' => 'Registration payment for sport league',
                'qty' => 1
            ]
        ];

        $date = Carbon::now();
        $data['invoice_id'] = strtotime($date->toDateTimeString()) . Auth::user()->id;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $league->price;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return void
     */
    public function cancel()
    {
        return view('errors.payment-error');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @param Request $request
     * @return ResponseAlias
     * @throws Exception
     */
    public function success(Request $request)
    {
        $races = Races::all();
        $league = League::find(1);

        if(!Auth::user()->invoice){
            $clientId = 'AXiFCJAVKRr8CkyUdX_exLrxJ9u_EWVGMSsX4YvdIMP_5hIJoObK7mJoH0pKEfBYA3i__KCW6XXCsX5J';
            $clientSecret = 'ECKVG6Iv5FiXfqaeJBOhHk5hTh-jpPKFABwIJ0g12bXB6pIVrgu_-Rhoel4cBtnEK9EAFDH5z--K_Oyf';
            $userid = 'sb-gtdov177746_api1.business.example.com';
            $password = 'TM7WU8YEF7P3SD66';
            $signature = 'A6o980osSuGmfX-7olWc9-BqI12ZAcYroPNFfgaxT9lkz29rUO17dIeA';
            $authorizationString = base64_encode($clientId . ':' . $clientSecret);

            /* Auth */
            $client = new \GuzzleHttp\Client();
            $auth_response = $client->request(
                'POST',
                'https://api.sandbox.paypal.com/v1/oauth2/token',
                [
                    'headers' => [
                        'Authorization' => 'Basic ' . $authorizationString
                    ],
                    'form_params' => [
                        'grant_type' => 'client_credentials'
                    ]
                ]
            );
            $auth_data = json_decode($auth_response->getBody()->getContents());
            $bearer = $auth_data->access_token;
            $app_id = $auth_data->app_id;

            /* Create invoice draft */
            $client = new \GuzzleHttp\Client([
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $bearer,
                )
            ]);

            $date = Carbon::now();
            $json_data = [
                'detail' => [
                    'invoice_number' => strtotime($date->toDateTimeString()) . Auth::user()->id,
                    'reference' => 'deal-ref',
                    'currency_code' => 'USD',
                ],
                'invoicer' => [
                    'name' => [
                        "given_name" => Auth::user()->first_name,
                        "surname" => Auth::user()->last_name
                    ],
                    'phones' => [
                        0 => [
                            "country_code" => "00",
                            "national_number" => Auth::user()->phone,
                            "phone_type" => "MOBILE"
                        ]
                    ],
                ],
                'items' => [
                    0 => [
                        "name" => "Sport League",
                        "description" => "Sport League description.",
                        "quantity" => "1",
                        "unit_amount" => [
                            "currency_code" => "USD",
                            "value" => $league->price . ".00"
                        ],
                        "unit_of_measure" => "QUANTITY"
                    ]
                ],
            ];

            $response = $client->request(
                'POST',
                'https://api.sandbox.paypal.com/v2/invoicing/invoices',
                ['json' => $json_data]
            );
            $href = json_decode($response->getBody()->getContents())->href;
            $invoice_id = substr($href, strpos($href, 'invoices/') + 9);

            /* Get invoice link */
            $client = new \GuzzleHttp\Client([
                'headers' => array(
                    'X-PAYPAL-SECURITY-USERID' => $userid,
                    'X-PAYPAL-SECURITY-PASSWORD' => $password,
                    'X-PAYPAL-SECURITY-SIGNATURE' => $signature,
                    'X-PAYPAL-REQUEST-DATA-FORMAT' => 'JSON',
                    'X-PAYPAL-RESPONSE-DATA-FORMAT' => 'JSON',
                    'X-PAYPAL-APPLICATION-ID' => $app_id,
                    'Content-Type' => 'application/json',
                )
            ]);

            $get_json_data = [
                'requestEnvelope' => [
                    'errorLanguage' => 'en_US',
                    'detailLevel' => 'ReturnAll',
                ],
                'invoiceID' => $invoice_id
            ];

            $response = $client->request(
                'POST',
                'https://svcs.sandbox.paypal.com/Invoice/GetInvoiceDetails',
                ['json' => $get_json_data]
            );
            $invoice_url = json_decode($response->getBody()->getContents())->payerViewURL;
            $user = Auth::user();
            $user->invoice = $invoice_url;
            $user->save();
        }

        return view('auth.payment-success', compact('races', 'league'));
    }
}
