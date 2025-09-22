<?php

use App\Http\Controllers\DisplayController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\Tour;
Route::get('/', function(){
    return view('welcome');

});
Route::get('/' ,[DisplayController::class, 'index']);

//destinations

Route::get("/destinations",[DisplayController::class, 'getalldestinations',]);


//tours
Route::get('/tours',[DisplayController::class, 'getalltours']);

//blog

Route::get('/blog', function () {
    return view ('blog');
    });
//contact
Route::get('/contact', function () {
    return view ('contact');
    });

//About

Route::get('/about', function () {
    return view ('about');
    });

//tour.shows
Route::get('/tours/{id}', function ($id) {
    $tour = Tour::findOrFail($id); // fetch the tour
    return view('tours.show', ['tour' => $tour]);
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

require __DIR__.'/auth.php';
