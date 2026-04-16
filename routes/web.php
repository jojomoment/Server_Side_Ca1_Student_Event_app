<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Public Routes (NO LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

// Homepage → dashboard
Route::view('/', 'dashboard')->name('home');



// View events + event details
Route::resource('events', EventController::class)->only([
    'index', 'show'
]);



// Dashboard
Route::view('/dashboard', 'dashboard')->name('dashboard');

// Public bookings page
Route::get('/my-bookings', [BookingController::class, 'index'])
    ->name('bookings.index');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Book an event
    Route::post('/events/{event}/book', [BookingController::class, 'store'])
        ->name('bookings.store');

    // Cancel booking
    Route::delete('/cancel/{booking}', [BookingController::class, 'destroy'])
        ->name('bookings.destroy');
});



/*
|--------------------------------------------------------------------------
| Admin Routes (ADMIN ONLY)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/events/create', [EventController::class, 'create'])
        ->name('events.create');

    Route::post('/events', [EventController::class, 'store'])
        ->name('events.store');

    Route::get('/events/{event}/edit', [EventController::class, 'edit'])
        ->name('events.edit');

    Route::put('/events/{event}', [EventController::class, 'update'])
        ->name('events.update');

    Route::delete('/events/{event}', [EventController::class, 'destroy'])
        ->name('events.destroy');
});



/*
|--------------------------------------------------------------------------
| Auth Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
