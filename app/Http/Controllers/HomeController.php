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
        $league = League::first();
        $races = Races::all();
//        return view($this->view_path.'index', compact(['league', 'races']));

        $coming_text = Settings::where('title', 'Coming Soon')->pluck('content')->first();
        $coming_description = Settings::where('title', 'Coming Soon Description')->pluck('content')->first();
        $coming_date = Settings::where('title', 'Coming Soon Date')->pluck('content')->first();
        return view($this->view_path.'coming', compact(['coming_text', 'coming_description', 'coming_date']));
    }
}
