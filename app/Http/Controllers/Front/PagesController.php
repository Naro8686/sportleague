<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Races;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact() {
        return view('website.contact.index');
    }

    public function races() {
        $races = Races::all();
        return view('website.races.index', compact('races'));
    }
}
