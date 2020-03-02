<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSelectRaceRequest;
use App\Models\Clubs;
use App\Models\League;
use App\Models\Payments;
use App\Models\RaceCategory;
use App\Models\Races;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\AdaptivePayments;
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
        $data = [
            'receivers'  => [
                [
                    'email' => 'sb-wxxdd599761@personal.example.com',
                    'amount' => $league->price,
                    'primary' => true,
                ],
                [
                    'email' => 'janedoe@example.com',
                    'amount' => 5,
                    'primary' => false
                ]
            ],
            'payer' => 'EACHRECEIVER', // (Optional) Describes who pays PayPal fees. Allowed values are: 'SENDER', 'PRIMARYRECEIVER', 'EACHRECEIVER' (Default), 'SECONDARYONLY'
            'return_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ];

        $provider = new AdaptivePayments();

        $response = $provider->createPayRequest($data);

        $redirect_url = $provider->getRedirectUrl('approved', $response['payKey']);

        return redirect($redirect_url);
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return void
     */
    public function cancel()
    {
        if(Auth::user()->payment && Auth::user()->payment->status == 'success'){
            return redirect()->route('admin.home');
        }else{
            Payments::updateOrCreate(
                ['user_id' => Auth::user()->id],
                [
                    'status' => 'canceled',
                    'amount' => 0
                ]
            );
            return view('errors.payment-error');
        }
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
        Payments::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'order_id' => $request->id,
                'status' => 'success',
                'email' => $request->payer['email_address'],
                'payer_id' => $request->payer['payer_id'],
                'full_name' => $request->payer['name']['given_name'] . ' ' . $request->payer['name']['surname'],
                'amount' => $request->purchase_units[0]['amount']['value'],
                'currency_code' => $request->purchase_units[0]['amount']['currency_code'],
            ]
        );

        return 'success';
    }

    public function pay() {
        $league = League::find(1);
        return view('website.payments.index', compact('league'));
    }

    public function stepTwo() {
        $user = Auth::user();
        if($user->races->count()){
            abort(401);
        }
        $races = Races::all();
        $clubs = Clubs::all();
        $race_categories = RaceCategory::all();
        $league = League::find(1);

        return view('admin.users.step-two', compact(['races', 'league', 'clubs', 'race_categories']));
    }

    /**
     * @param StoreSelectRaceRequest $request
     * @return RedirectResponse
     */
    public function selectRaces(StoreSelectRaceRequest $request)
    {
        $user = Auth::user();
        $league = League::find(1);

        foreach ($request['event'] as $event){
            $race = Races::find($event);
            if($race->users->count() < $race->max_marshals){
                $race->users()->attach([
                    'user_id' => Auth::user()->id
                ]);
            }else{
                return redirect()->back()->withErrors([_e('On the race had already registered the maximum number of participants')]);
            }
        }

        $user->club()->detach();
        $user->club()->attach([
            'club_id' => $request->club
        ]);
        $user->update([
            'race_category' => $request->race_category,
            'phone' => $request->phone,
        ]);

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
                'currency_code' => 'EUR',
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
                    "name" => " ",
                    "description" => "Wexford Cycling League",
                    "quantity" => "1",
                    "unit_amount" => [
                        "currency_code" => "EUR",
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

        $payment = Payments::where('user_id', $user->id)->first();
        $payment->invoice_url = $invoice_url;
        $payment->save();

        return redirect()->route('admin.home');
    }

    public function payments(){
        $payments = Payments::all();

        return view('admin.payments.index', compact('payments'));
    }

    public function paid(Request $request){
        $payment = Payments::where('user_id', $request->user_id)->first();
        if (is_null($payment)){
            Payments::create([
                'user_id' => $request->user_id,
                'status' => 'success',
            ]);
        }else{
            $payment->delete();
        }
    }
}
