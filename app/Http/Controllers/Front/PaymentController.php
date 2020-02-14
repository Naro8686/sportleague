<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\League;
use App\Models\Payments;
use App\Models\RaceCategory;
use App\Models\Races;
use App\User;
use Carbon\Carbon;
use Exception;
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
