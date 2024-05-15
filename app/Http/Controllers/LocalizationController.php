<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function index(Request $request)
    {
        if(!session()->has('locale')){
            App::setLocale('EN');
        }
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
