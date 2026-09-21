<?php

use App\Http\Controllers\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $services = Service::latest()->get();

    return view('home', compact('services'));
})->name('home');

Route::resource('services', ServiceController::class)->except('show');