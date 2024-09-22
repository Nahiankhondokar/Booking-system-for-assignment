<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('booking')->group(function(){
    Route::get('/', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/store', [BookingController::class, 'store'])->name('booking.store');
});
Route::middleware('auth')->prefix('event')->group(function(){
    Route::get('/', [EventController::class, 'index'])->name('event.index');
    Route::post('/store', [EventController::class, 'store'])->name('event.store');
});

require __DIR__.'/auth.php';
