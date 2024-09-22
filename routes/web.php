<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BookingController::class, 'index']);
Route::prefix('event')->group(function(){
    Route::get('/', [EventController::class, 'index'])->name('event');
    Route::post('/store', [EventController::class, 'store'])->name('event.store');
});