<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\IfAlreadyLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => [IfAlreadyLogin::class]], static function () {
    Route::get('/redirect', [AuthController::class, 'redirect'])->name('redirect');
    Route::get('/callback', [AuthController::class, 'callback'])->name('callback');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/{slug}', [CourseController::class, 'show'])->name('show');
    Route::get('/{slug}/checkout', [CourseController::class, 'checkout'])->name('checkout');
});
Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function () {
    Route::post('/{course}', [CheckoutController::class, 'checkout'])->name('process');
    Route::get('/success', [CheckoutController::class, 'validatePayment'])->name('success');
});

