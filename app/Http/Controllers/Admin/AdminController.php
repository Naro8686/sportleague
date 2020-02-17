<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\Payments;
use App\Models\RaceCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
        if (! Gate::allows('view_users') && ! Gate::allows('users_manage') ) {
            if(!is_null(Auth::user()->payment) && is_null(Auth::user()->phone) || is_null(Auth::user()->race_category)){
                return redirect()->route('step-two');
            }
            return view('admin.home');
        }else{
            $clubs = Clubs::all();
            $categories = RaceCategory::all();
            $user_ids = Payments::all()->pluck('user_id');
            $users = User::whereIn('id', $user_ids)->where('id', '!=', 1)->get();
            $not_paid = User::whereNotIn('id', $user_ids)->where('id', '!=', 1)->get();
            return view('admin.reports.index', compact(['users', 'clubs', 'categories', 'not_paid']));
        }
    }
}
