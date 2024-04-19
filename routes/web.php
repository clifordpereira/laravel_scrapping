<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScrapedDataController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('scraped-data', [ScrapedDataController::class, 'index']);