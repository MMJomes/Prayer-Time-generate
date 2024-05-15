<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Config;
class SetLanguage
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('locale')) {
            Session::put('locale', Config::get('app.locale'));
        }
        App::setLocale(Session::get('locale'));
        return $next($request);
    }
}
