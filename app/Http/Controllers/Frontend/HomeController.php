<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.page.index');
    }

    public function contact()
    {
        return view('frontend.page.contactus');
    }
    public function about()
    {
        return view('frontend.page.aboutus');
    }
}
