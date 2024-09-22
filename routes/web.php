<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('layouts.app');
    // return view('booking');
    return view('event');
});
