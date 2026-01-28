<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\InquiryController;
use App\Models\Tour;
use App\Models\Config;
use App\Models\Team;
use App\Models\Destination;
use Livewire\Volt\Volt;

/*
Public Routes
These routes handle general website navigation and public-facing pages.
*/

Route::get('/', [DisplayController::class, 'index'])->name('home');

// Destinations
Route::get('/destinations', [DisplayController::class, 'getAllDestinations'])
    ->name('destinations.index');

Route::get('/destinations/{id}', function ($id) {
    $destination = Destination::findOrFail($id);
    return view('destinations.show', compact('destination'));
})->name('destinations.show');

// Tours
Route::get('/tours', [DisplayController::class, 'getAllTours'])
    ->name('tours.index');

Route::get('/tours/{id}', function ($id) {
    $tour = Tour::findOrFail($id);
    return view('tours.show', compact('tour'));
})->name('tours.show');

// Blog
Route::view('/blog', 'blog')->name('blog');

// Contact Page
Route::get('/contact', function () {
    $setting = Config::first();
    return view('contact', compact('setting'));
})->name('contact');

// About Page
Route::get('/about', function () {
    $setting = Config::first();
    $teams = Team::all();
    return view('about', compact('setting', 'teams'));
})->name('about');

/*

Form Submissions

Handles customer inquiries and reviews.
*/

Route::post('/inquiries', [InquiryController::class, 'inquiry'])
    ->name('inquiries.store');

Route::post('/reviews', [InquiryController::class, 'review'])
    ->name('reviews.store');

/*
Authenticated User Routes
Protected routes accessible only to logged-in users.
*/

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::redirect('/settings', '/settings/profile');

    Volt::route('/settings/profile', 'settings.profile')
        ->name('profile.edit');

    Volt::route('/settings/password', 'settings.password')
        ->name('password.edit');

    Volt::route('/settings/appearance', 'settings.appearance')
        ->name('appearance.edit');
});

// Currency Converter Routes
Route::get('/currency-converter', [App\Http\Controllers\CurrencyController::class, 'index'])
    ->name('currency.converter');

Route::post('/currency-convert', [App\Http\Controllers\CurrencyController::class, 'convert'])
    ->name('currency.convert');

Route::get('/currency-convert', [App\Http\Controllers\CurrencyController::class, 'convert'])
    ->name('currency.convert.get');

Route::get('/currencies', [App\Http\Controllers\CurrencyController::class, 'getSupportedCurrencies'])
    ->name('currencies.list');

// Authentication routes
require __DIR__ . '/auth.php';
