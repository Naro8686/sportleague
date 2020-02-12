<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\RaceCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->leftJoin('user_races', 'users.id', '=', 'user_races.user_id')
            ->where('user_id', '!=', null)
            ->get()
            ->unique('id');
        $clubs = Clubs::all();
        $categories = RaceCategory::all();
        if (! Gate::allows('view_users') && ! Gate::allows('users_manage') ) {
            return view('admin.home');
        }else{
            return view('admin.reports.index', compact(['users', 'clubs', 'categories']));
        }
    }
}
