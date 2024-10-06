<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ResumeController;
Route::prefix('admin')->group(function(){
    Auth::routes();
});

Route::get('/', function () {
    return view('auth.login');
});


Route::get('lang/{lang}', [LocalizationController::class, 'index'])->name('lang.switch');
Route::group(['middleware' => ['auth', 'language']], function () {
    Route::get('/download/{slug}', [ResumeController::class, 'resumedownload'])->name('resume.download');

    Route::resource('resume',ResumeController::class);
    Route::namespace('App\Http\Controllers\Backend')->middleware(['auth'])->prefix('admin')->as('backend.')->group(function(){
        Route::get('/prayertimes', 'DashboardController@index')->name('dashboard.index');
        Route::get('dashboard','DashboardController@index')->name('dashboard.index');
        Route::get('/prayertimes', 'DashboardController@fetchPrayerTimes')->name('dashboard.prayertimes');
        Route::get('song/prayerdetails/{date}/{zone}','DashboardController@detail')->name('song.detail');
        Route::resource('roles',RolesController::class);
        Route::resource('subscriber',SubscribersController::class);
        Route::resource('box',BoxsController::class);
        Route::resource('song',SongsController::class);
        Route::resource('admins',AdminsController::class);
    });
});
Route::get('/clc', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return "done";
});
