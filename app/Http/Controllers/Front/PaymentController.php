<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\League;
use App\Models\Payments;
use App\Models\RaceCategory;
use App\Models\Races;
use Carbon\Carbon;
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
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        Payments::create([
            'user_id' => Auth::user()->id,
            'email' => $response['EMAIL'],
            'payer_id' => $response['PAYERID'],
            'first_name' => $response['FIRSTNAME'],
            'last_name' => $response['LASTNAME'],
            'country' => $response['COUNTRYCODE'],
            'invoice_number' => $response['INVNUM'],
            'amt' => $response['AMT'],
            'token' => $response['TOKEN'],
        ]);

        return redirect()->route('admin.step-two');
    }

    public function payments(){
        $payments = Payments::all();

        return view('admin.payments.index', compact('payments'));
    }
}
