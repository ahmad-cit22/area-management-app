<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('pages.index');
    })->name('dashboard');

    Route::resource('countries', CountryController::class);

    Route::resource('states', StateController::class);

    Route::resource('cities', CityController::class);
});
