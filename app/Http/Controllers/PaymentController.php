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
        dd('Your payment is canceled. You can create cancel page here.');
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
//
//        $clientId = 'AXiFCJAVKRr8CkyUdX_exLrxJ9u_EWVGMSsX4YvdIMP_5hIJoObK7mJoH0pKEfBYA3i__KCW6XXCsX5J';
//        $clientSecret = 'ECKVG6Iv5FiXfqaeJBOhHk5hTh-jpPKFABwIJ0g12bXB6pIVrgu_-Rhoel4cBtnEK9EAFDH5z--K_Oyf';
//
//        $client = new \GuzzleHttp\Client();
//
//        $authorizationString = base64_encode($clientId . ':' . $clientSecret);
//
//        $auth_response = $client->request(
//            'POST',
//            'https://api.sandbox.paypal.com/v1/oauth2/token',
//            [
//                'headers' => [
//                    'Authorization' => 'Basic ' . $authorizationString
//                ],
//                'form_params' => [
//                    'grant_type' => 'client_credentials'
//                ]
//            ]
//        );
//        $auth_data = json_decode($auth_response->getBody()->getContents());
//        $bearer = $auth_data->access_token;
//        $app_id = $auth_data->app_id;
//
//        $client = new \GuzzleHttp\Client([
//            'headers' => array(
//                'Content-Type' => 'application/json',
//                'Authorization' => 'Bearer ' . $bearer,
//            )
//        ]);
//
//        $jsa = json_decode('{
//  "detail": {
//    "invoice_number": "0008",
//    "reference": "deal-ref",
//    "currency_code": "USD"
//  },
//  "invoicer": {
//    "name": {
//      "given_name": "David",
//      "surname": "Larusso"
//    },
//    "phones": [{
//      "country_code": "00",
//      "national_number": "4085551234",
//      "phone_type": "MOBILE"
//    }]
//  },
//  "items": [{
//    "name": "Sport League",
//    "description": "Sport League description.",
//    "quantity": "1",
//    "unit_amount": {
//      "currency_code": "USD",
//      "value": "10.00"
//    },
//    "unit_of_measure": "QUANTITY"
//  }]
//}');
//
//        $data = json_encode($jsa);
//
//        $client = new \GuzzleHttp\Client([
//            'headers' => ['Content-Type' => 'application/json','Authorization' => 'Bearer ' . $bearer,]
//        ]);
//        $response = $client->post('https://api.sandbox.paypal.com/v2/invoicing/invoices',
//            ['body' => $data]
//        );
//        $response = json_decode($response->getBody(), true);
//        dd(json_decode($response->getBody()) );
//        $date = Carbon::now();
//        $response = $client->request(
//            'POST',
//            'https://api.sandbox.paypal.com/v2/invoicing/invoices',
//            [
//                'headers' => [
//                    'Content-Type' => 'application/json',
//                    'Authorization' => 'Bearer ' . $bearer,
//                ],
//                'form_params' => [
//                    'detail' => [
//                        'invoice_number' => strtotime($date->toDateTimeString()) . Auth::user()->id,
//                        'reference' => 'deal-ref',
//                        'currency_code' => 'USD',
//                    ],
//                    'invoicer' => [
//                        'name' => [
//                            "given_name" => Auth::user()->first_name,
//                            "surname" => Auth::user()->last_name
//                        ],
//                        'phones' => [
//                            "country_code" => "00",
//                            "national_number" => Auth::user()->phone,
//                            "phone_type" => "MOBILE"
//                        ],
//                    ],
//                    'items' => [
//                        "name" => "Sport League",
//                        "description" => "Sport League description.",
//                        "quantity" => "1",
//                        "unit_amount" => [
//                            "currency_code" => "USD",
//                            "value" => $league.".00"
//                        ],
//                        "unit_of_measure" => "QUANTITY"
//                    ],
//                ]
//            ]);
//        dd($response->getBody()->getContents());


        //        $provider = new ExpressCheckout;
//        $response = $provider->getExpressCheckoutDetails($request->token);

        return view('auth.payment-success', compact('races', 'league'));
    }
}
