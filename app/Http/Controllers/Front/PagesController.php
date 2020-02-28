<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\PrivacyPolicy;
use App\Models\Races;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function faq() {
        $faq = PrivacyPolicy::find(2);
        return view('website.faq.index', compact('faq'));
    }

    public function terms() {
        $terms = PrivacyPolicy::find(3);
        return view('website.terms.index', compact('terms'));
    }

    public function contact() {
        $contact = PrivacyPolicy::find(5);
        return view('website.contact.index', compact('contact'));
    }

    public function races() {
        $races = Races::orderBy('date', 'asc')->get();
        return view('website.races.index', compact('races'));
    }
}
