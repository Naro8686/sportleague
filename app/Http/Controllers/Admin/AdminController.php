<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\RaceCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        $clubs = Clubs::all();
        $categories = RaceCategory::all();
        if (! Gate::allows('view_users')) {
            return view('admin.home');
        }else{
            return view('admin.reports.index', compact('users', 'clubs', 'categories'));
        }
    }
}
