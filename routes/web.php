<?php

use App\Http\Controllers\DisplayController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\inquiryController;
use App\Models\Tour;
use App\Models\Config;
use App\Models\Team;
use App\Models\destination;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [DisplayController::class, 'index']);

//destinations

Route::get("/destinations", [DisplayController::class, 'getalldestinations',]);

Route::get('/destinations/{id}', function ($id) {
    $destination = destination::findOrFail($id);
    return view('destinations.show', ['destination' => $destination]);
})->name('destinations.show');


//tours
Route::get('/tours', [DisplayController::class, 'getalltours'])->name('tours.index');

//blog

Route::get('/blog', function () {
    return view('blog');
});
//contact
Route::get('/contact', function () {
    $setting = Config::first();
    return view('contact', ['setting' => $setting]);
});
//reviews
Route::post('/reviews', [inquiryController::class, 'review'])->name('reviews.store');

//About

Route::get('/about', function () {
    $setting = Config::first();
    $teams = Team::get();
    return view('about', ['setting' => $setting, 'teams' => $teams]);
});

//tour.shows






//inquiries

Route::post('/inquiries', [inquiryController::class, 'inquiry'])->name('inquiries.store');



Route::get('/tours/{id}', function ($id) {
    $tour = Tour::findOrFail($id); // fetch the tour
    return view('Tours.show', ['tour' => $tour]);
})->name('tours.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

require __DIR__ . '/auth.php';
