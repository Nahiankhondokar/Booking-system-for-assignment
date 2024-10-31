<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomFormController;
use App\Http\Controllers\TestController;
use App\Models\Coupon;
use Illuminate\Support\Facades\Gate;

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
    Route::get('/coupon-list', [CouponController::class, 'index'])->name('coupon.list');
    Route::get('/coupon-one', [CouponController::class, 'firstCoupon'])->name('coupon.one');
    Route::get('/coupon-create/{type}', [CouponController::class, 'couponCreate'])->name('coupon.create');
    Route::get('/coupon-pdf', [CouponController::class, 'pdfView'])->name('pdf.view');
    Route::post('/coupon-store', [CouponController::class, 'couponStore'])->name('coupon.store');
    Route::get('/coupon-delete/{id}', [CouponController::class, 'couponDelete'])->name('coupon.delete');
    Route::get('/pdf/{id}', [CouponController::class, 'pdfGenerator'])->name('pdf');



});
Route::resource('/tests', TestController::class);


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
           'password'   => Str::password(), 
        ]
    );
    Auth::login($user);

    return redirect()->route('dashboard');
});



require __DIR__.'/auth.php';