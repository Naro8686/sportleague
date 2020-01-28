<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        return view($this->view_path.'index');
    }
}
