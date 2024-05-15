<?php
namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.

     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ensure that the 'languages' configuration is loaded
        $languages = Config::get('languages');

        if ($languages && is_array($languages)) {
            // Check if the 'language' cookie is set and is a supported language
            if (isset($_COOKIE['language']) && array_key_exists($_COOKIE['language'], $languages)) {
                // Set the application locale based on the cookie value
                App::setLocale($_COOKIE['language']);
            } else {
                // If the cookie is not set or the language is not supported, fall back to English ('EN')
                App::setLocale('EN');
            }
        } else {
            // Handle the case where the 'languages' configuration is not properly defined
            dd('Error: Please check your languages configuration');
        }
    }

}
