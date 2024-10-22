<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomFormController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('auth')->prefix('booking')->group(function(){
    Route::get('/', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/store', [BookingController::class, 'store'])->name('booking.store');
});
Route::middleware('auth')->prefix('event')->group(function(){
    Route::get('/', [EventController::class, 'index'])->name('event.index');
    Route::post('/store', [EventController::class, 'store'])->name('event.store');
});

Route::middleware('auth')->prefix('custom-form')->group(function(){
    Route::get('/', [CustomFormController::class, 'index'])->name('form.index');
    Route::post('/store', [CustomFormController::class, 'store'])->name('form.store');
});

// Create coupon
Route::middleware('auth')->group(function(){
    Route::get('/', [CouponController::class, 'index'])->name('coupon.list');
    Route::get('/coupon-one', [CouponController::class, 'firstCoupon'])->name('coupon.one');
    Route::get('/coupon-create', [CouponController::class, 'couponCreate'])->name('coupon.create');
    // Route::post('/store', [CustomFormController::class, 'store'])->name('form.store');
});


// Open Authentication
Route::get('/auth/redirect', function () {
    
    return Socialite::driver('github')
    // ->scopes(['read:user'])
    ->redirect();

})->name('github.login');

Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    // dd($githubUser);

    $user = User::query()->updateOrCreate(
        [
        'email'         => $githubUser->email
        ],
        [
           'name'       => $githubUser->name, 
           'password'   => $githubUser->name, 
        ]
    );
    Auth::login($user);

    return redirect()->route('dashboard');
});

require __DIR__.'/auth.php';