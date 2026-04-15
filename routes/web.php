<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Public Routes
Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');

// Protected Routes (Require Authentication)
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Event Management (CRUD)
    Route::resource('events', EventController::class)
        ->except(['index']); // Prevent duplicate index route

    // Booking Routes
    Route::get('/events/{event}/book', [BookingController::class, 'create'])
        ->name('bookings.create');

    Route::post('/events/{event}/book', [BookingController::class, 'store'])
        ->name('bookings.store');

    // View User Bookings
    Route::get('/my-bookings', [BookingController::class, 'index'])
        ->name('bookings.index');
});

// Authentication Routes
require __DIR__ . '/auth.php';