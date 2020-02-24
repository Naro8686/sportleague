<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\League;
use App\Models\Races;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $view_path = 'website.home.';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application website.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coming = Settings::where('title', 'Coming Soon')->pluck('content')->first();
        if(json_decode($coming, true)['show'] == 'true'){
            $coming = json_decode($coming, true);
            return view($this->view_path.'coming', compact(['coming']));
        }else{
            $league = League::first();
            $races = Races::all();
            return view($this->view_path.'index', compact(['league', 'races']));
        }
    }
}
