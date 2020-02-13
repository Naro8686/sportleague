<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clubs;
use App\Models\League;
use App\Models\Payments;
use App\Models\RaceCategory;
use App\Models\Races;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Http\Requests\Admin\StoreSelectRaceRequest;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('paid');*/
    }
    /**
     * Display a listing of User.
     *
     * @return Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage') && ! Gate::allows('view_users')) {
            return abort(401);
        }

        $users = User::where('id', '!=', 1)->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');
        $races = Races::all();
        $race_categories = RaceCategory::all();
        $clubs = Clubs::all();
        $league = League::find(1);

        return view('admin.users.create', compact(['roles', 'races', 'clubs', 'league', 'race_categories']));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param StoreUsersRequest $request
     * @return Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $data = $request->all();
        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        $club = Clubs::find($data['club']);
        $club->users()->attach([
            'user_id' => $user->id
        ]);

        if(isset($data['event'])){
            foreach ($data['event'] as $event){
                $race = Races::find($event);
                $race->users()->attach([
                    'user_id' => $user->id
                ]);
            }
        }

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        if (! Gate::allows('users_manage') && Auth::user()->id != $user->id) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');
        $races = Races::all();
        $clubs = Clubs::all();
        $race_categories = RaceCategory::all();

        return view('admin.users.edit', compact(['user', 'roles', 'races', 'clubs', 'race_categories']));
    }

    /**
     * Update User in storage.
     *
     * @param UpdateUsersRequest $request
     * @param User $user
     * @return Response
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        if (! Gate::allows('users_manage') && Auth::user()->id != $user->id) {
            return abort(401);
        }
        $data = $request->all();
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        if($roles){
            $user->syncRoles($roles);
        }

        $user->club()->detach();
        $user->club()->attach([
            'club_id' => $data['club']
        ]);

        return redirect()->route('admin.users.edit', $user->id);
    }

    public function show(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param User $user
     * @return Response
     * @throws Exception
     */
    public function destroy(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('admin.users.index');
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
        $user->club()->attach([
            'club_id' => $request->club
        ]);
        $user->update([
            'race_category' => $request->race_category,
            'phone' => $request->phone,
        ]);

        foreach ($request['event'] as $event){
            $race = Races::find($event);
            $race->users()->attach([
                'user_id' => Auth::user()->id
            ]);
        }

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

        $payment = Payments::where('user_id', $user->id)->first();
        $payment->invoice_url = $invoice_url;
        $payment->save();

        return redirect()->route('admin.home');
    }
}
