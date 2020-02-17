<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\Payments;
use App\Models\RaceCategory;
use App\User;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportsController extends Controller
{
    public function index() {
        $user_ids = Payments::all()->pluck('user_id');
        $users = User::whereIn('id', $user_ids)->where('id', '!=', 1)->get();
        $clubs = Clubs::all();
        $categories = RaceCategory::all();

        return view('admin.reports.index', compact(['users', 'clubs', 'categories']));
    }

    public function registrationPDF() {
        $user_ids = Payments::all()->pluck('user_id');
        $users = User::whereIn('id', $user_ids)->where('id', '!=', 1)->get();
        $clubs = Clubs::all();
        $categories = RaceCategory::all();
        $pdf = PDF::loadView('admin.reports.registrations-pdf', compact(['users', 'clubs', 'categories']));

        return $pdf->download('registration.pdf');
    }
}
