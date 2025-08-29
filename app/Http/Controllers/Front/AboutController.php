<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;

class AboutController extends Controller
{
    public function index()
    {
        $about_data = AboutPage::first();
        return view('front.about', compact('about_data'));
    }
}
