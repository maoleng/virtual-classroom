<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/{slug}', [CourseController::class, 'show'])->name('show');
    Route::get('/{slug}/checkout', [CourseController::class, 'checkout'])->name('checkout');
});
Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function () {
    Route::post('/{course}', [CheckoutController::class, 'checkout'])->name('process');
    Route::get('/success', [CheckoutController::class, 'success'])->name('success');
});

