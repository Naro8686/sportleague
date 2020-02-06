<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\RaceCategory;
use App\User;
use PDF;

class ReportsController extends Controller
{
    public function index() {
        $users = User::where('id', '!=', 1)->get();
        $clubs = Clubs::all();
        $categories = RaceCategory::all();

        return view('admin.reports.index', compact('users', 'clubs', 'categories'));
    }

    public function registrationPDF() {
        $users = User::where('id', '!=', 1)->get();
        $clubs = Clubs::all();
        $categories = RaceCategory::all();
        $pdf = PDF::loadView('admin.reports.registrations-pdf', compact('users', 'clubs', 'categories'));

        return $pdf->download('registration.pdf');
    }
}
