<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

// Public route
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Logged-in users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // View single event
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

    // Book event
    Route::get('/events/{event}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/events/{event}/book', [BookingController::class, 'store'])->name('bookings.store');

    // User bookings
    Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
});

// Admin only
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

require __DIR__.'/auth.php';